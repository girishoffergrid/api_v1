<?php

require_once dirname(__FILE__) . '/init.php';
require_once UTIL_PATH . '/MediaUtils.php';

function createGoogleCampain(AdWordsUser $user,$money_per_day,$campain_Name){
    
    // Get the BudgetService, which loads the required classes.
  $budgetService = $user->GetService('BudgetService', ADWORDS_VERSION);

  // Create the shared budget (required).
  $budget = new Budget();
  $budget->name = $campain_Name.'_Budget #'.uniqid();
  $budget->period = 'DAILY';
  $budget->amount = new Money($money_per_day);
  $budget->deliveryMethod = 'STANDARD';

  $operations = array();

  // Create operation.
  $operation = new BudgetOperation();
  $operation->operand = $budget;
  $operation->operator = 'ADD';
  $operations[] = $operation;

   // Make the mutate request.
  $result = $budgetService->mutate($operations);
  $budget = $result->value[0];

  // Get the CampaignService, which loads the required classes.
  $campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

  $numCampaigns = 1;
  $operations = array();
  for ($i = 0; $i < $numCampaigns; $i++) {
    // Create campaign.
    $campaign = new Campaign();
    $campaign->name = $campain_Name ;
    $campaign->advertisingChannelType = 'SEARCH';

    // Set shared budget (required).
    $campaign->budget = new Budget();
    $campaign->budget->budgetId = $budget->budgetId;

    // Set bidding strategy (required).
    $biddingStrategyConfiguration = new BiddingStrategyConfiguration();
    $biddingStrategyConfiguration->biddingStrategyType = 'MANUAL_CPC';

    // You can optionally provide a bidding scheme in place of the type.
    $biddingScheme = new ManualCpcBiddingScheme();
    $biddingScheme->enhancedCpcEnabled = FALSE;
    $biddingStrategyConfiguration->biddingScheme = $biddingScheme;

    $campaign->biddingStrategyConfiguration = $biddingStrategyConfiguration;

    // Set keyword matching setting (required).
    $keywordMatchSetting = new KeywordMatchSetting();
    $keywordMatchSetting->optIn = TRUE;
    $campaign->settings[] = $keywordMatchSetting;

    // Set network targeting (optional).
    $networkSetting = new NetworkSetting();
    $networkSetting->targetGoogleSearch = TRUE;
    $networkSetting->targetSearchNetwork = TRUE;
    $networkSetting->targetContentNetwork = TRUE;
    $campaign->networkSetting = $networkSetting;

    // Set additional settings (optional).
    $campaign->status = 'PAUSED';
    $campaign->startDate = date('Ymd', strtotime('+1 day'));
    $campaign->endDate = date('Ymd', strtotime('+1 month'));
    $campaign->adServingOptimizationStatus = 'ROTATE';

    // Set frequency cap (optional).
    $frequencyCap = new FrequencyCap();
    $frequencyCap->impressions = 3;
    $frequencyCap->timeUnit = 'DAY';
    $frequencyCap->level = 'ADGROUP';
    $campaign->frequencyCap = $frequencyCap;

    // Set advanced location targeting settings (optional).
    $geoTargetTypeSetting = new GeoTargetTypeSetting();
    $geoTargetTypeSetting->positiveGeoTargetType = 'DONT_CARE';
    $geoTargetTypeSetting->negativeGeoTargetType = 'DONT_CARE';
    $campaign->settings[] = $geoTargetTypeSetting;

    // Create operation.
    $operation = new CampaignOperation();
    $operation->operand = $campaign;
    $operation->operator = 'ADD';
    $operations[] = $operation;
}

// Make the mutate request.
  $result = $campaignService->mutate($operations);

  // Display results.
  
  foreach ($result->value as $campaign) {
    //printf("Campaign with name '%s' and ID '%s' was added.\n", $campaign->name,
     //   $campaign->id);
         $camp_id_name = array($campaign->id,$campaign->name);
        }
  return $camp_id_name;
}

//-----------------------------------------------------------------------------------



function createGoogleGroups(AdWordsUser $user, $campaignId,$adsGroupName,$campMoney_per_click){
  // Get the service, which loads the required classes.
  $adGroupService = $user->GetService('AdGroupService', ADWORDS_VERSION);

  $numAdGroups = 1; // the no of ads depended on the requirement 
  $operations = array();
  for ($i = 0; $i < $numAdGroups; $i++) {
    // Create ad group.
    $adGroup = new AdGroup();
    $adGroup->campaignId = $campaignId;
    $adGroup->name = $adsGroupName;

    // Set bids (required).
    $bid = new CpcBid();
    $bid->bid =  new Money($campMoney_per_click);
    $biddingStrategyConfiguration = new BiddingStrategyConfiguration();
    $biddingStrategyConfiguration->bids[] = $bid;
    $adGroup->biddingStrategyConfiguration = $biddingStrategyConfiguration;

    // Set additional settings (optional).
    $adGroup->status = 'ENABLED';

    // Targetting restriction settings - these setting only affect serving
    // for the Display Network.
    $targetingSetting = new TargetingSetting();
    // Restricting to serve ads that match your ad group placements.
    $targetingSetting->details[] =
        new TargetingSettingDetail('PLACEMENT', TRUE);
    // Using your ad group verticals only for bidding.
    $targetingSetting->details[] =
        new TargetingSettingDetail('VERTICAL', FALSE);
    $adGroup->settings[] = $targetingSetting;

    // Create operation.
    $operation = new AdGroupOperation();
    $operation->operand = $adGroup;
    $operation->operator = 'ADD';
    $operations[] = $operation;
  }

  // Make the mutate request.
  $result = $adGroupService->mutate($operations);

  // Display result.
  $adGroups = $result->value;
  foreach ($adGroups as $adGroup) {
    //printf("Ad group with name '%s' and ID '%s' was added.\n", $adGroup->name,
     //   $adGroup->id);
    $adGroups_id_name =array($adGroup->id,$adGroup->name);
  }
  
  return $adGroups_id_name;
}





//--------------------------------------------------------------------------------
    
function createGoogleTextAds(AdWordsUser $user, $adGroupId,$headline,$description_1,$description_2,$display_url,$url) {
  // Get the service, which loads the required classes.
  $adGroupAdService = $user->GetService('AdGroupAdService', ADWORDS_VERSION);

  $numAds = 1;
  $operations = array();
  for ($i = 0; $i < $numAds; $i++) {
    // Create text ad.
    $textAd = new TextAd();
    $textAd->headline = $headline . uniqid();
    $textAd->description1 = $description_1;
    $textAd->description2 = $description_2;
    $textAd->displayUrl = $display_url;
    $textAd->url = $url;

    // Create ad group ad.
    $adGroupAd = new AdGroupAd();
    $adGroupAd->adGroupId = $adGroupId;
    $adGroupAd->ad = $textAd;

    // Set additional settings (optional).
    $adGroupAd->status = 'PAUSED';

    // Create operation.
    $operation = new AdGroupAdOperation();
    $operation->operand = $adGroupAd;
    $operation->operator = 'ADD';
    $operations[] = $operation;
  }

  // Make the mutate request.
  $result = $adGroupAdService->mutate($operations);

  // Display results.
  foreach ($result->value as $adGroupAd) {
    //printf("Text ad with headline '%s' and ID '%s' was added.\n",
      //  $adGroupAd->ad->headline, $adGroupAd->ad->id);
    return $adGroupAd->ad->id;
    
    
  }
}


//------------------------------------------------------------------------------------------

function GoogleAddKeywords(AdWordsUser $user, $adGroupId,$keywords_input,$BROAD_PHRASE_NEGATIVE) {
  // Get the service, which loads the required classes.
  $adGroupCriterionService =
      $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  $numKeywords = 1;
  $operations = array();
  for ($i = 0; $i < $numKeywords; $i++) {
    // Create keyword criterion.
    $keyword = new Keyword();
    $keyword->text = $keywords_input;
    $keyword->matchType = $BROAD_PHRASE_NEGATIVE;

    // Create biddable ad group criterion.
    $adGroupCriterion = new BiddableAdGroupCriterion();
    $adGroupCriterion->adGroupId = $adGroupId;
    $adGroupCriterion->criterion = $keyword;

    // Set additional settings (optional).
    $adGroupCriterion->userStatus = 'PAUSED';
    //$adGroupCriterion->destinationUrl = 'http://www.example.com/mars';

    /*// Set bids (optional).
    $bid = new CpcBid();
    $bid->bid =  new Money(500000);
    $biddingStrategyConfiguration = new BiddingStrategyConfiguration();
    $biddingStrategyConfiguration->bids[] = $bid;
    $adGroupCriterion->biddingStrategyConfiguration = $biddingStrategyConfiguration;
     */
    $adGroupCriteria[] = $adGroupCriterion;

    // Create operation.
    $operation = new AdGroupCriterionOperation();
    $operation->operand = $adGroupCriterion;
    $operation->operator = 'ADD';
    $operations[] = $operation;
  }

  // Make the mutate request.
  $result = $adGroupCriterionService->mutate($operations);

  // Display results.
  
  foreach ($result->value as $adGroupCriterion) {
    printf("Keyword with text '%s', match type '%s', and ID '%s' was added.\n",
        $adGroupCriterion->criterion->text,
        $adGroupCriterion->criterion->matchType,
        $adGroupCriterion->criterion->id);
    
    $keywords_id_text_match = $adGroupCriterion->criterion->id." ".$adGroupCriterion->criterion->text." ".$adGroupCriterion->criterion->matchType;
    }
    
    
    
    return $keywords_id_text_match;
}
