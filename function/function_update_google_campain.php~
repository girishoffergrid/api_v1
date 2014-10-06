<?php

require_once dirname(__FILE__) . '/init.php';


function UpdateGoogleAdGroup(AdWordsUser $user, $adGroupId,$money_to_update) {
  // Get the service, which loads the required classes.
  $adGroupService = $user->GetService('AdGroupService', ADWORDS_VERSION);

  // Create ad group using an existing ID.
  $adGroup = new AdGroup();
  $adGroup->id = $adGroupId;

  // Update the bid.
  $bid = new CpcBid();
  $bid->bid =  new Money($money_to_update * AdWordsConstants::MICROS_PER_DOLLAR);
  $biddingStrategyConfiguration = new BiddingStrategyConfiguration();
  $biddingStrategyConfiguration->bids[] = $bid;
  $adGroup->biddingStrategyConfiguration = $biddingStrategyConfiguration;

  // Create operation.
  $operation = new AdGroupOperation();
  $operation->operand = $adGroup;
  $operation->operator = 'SET';

  $operations = array($operation);

  // Make the mutate request.
  $result = $adGroupService->mutate($operations);

  // Display result.
  $adGroup = $result->value[0];
  printf("Ad group with ID '%s' has updated default bid '$%s'.\n", $adGroup->id,
      $adGroup->biddingStrategyConfiguration->bids[0]->bid->microAmount /
          AdWordsConstants::MICROS_PER_DOLLAR);
  
  
  $updated_id_money = $adGroup->id." ".$adGroup->biddingStrategyConfiguration->bids[0]->bid->microAmount /
          AdWordsConstants::MICROS_PER_DOLLAR;

  return $updated_id_money;

}


function UpdateGoogleCampaignStatus(AdWordsUser $user, $campaignId,$ELIGIBLE_or_PAUSED) {
  // Get the service, which loads the required classes.
  $campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

  // Create campaign using an existing ID.
  $campaign = new Campaign();
  $campaign->id = $campaignId;
  $campaign->status = $ELIGIBLE_or_PAUSED;

  // Create operation.
  $operation = new CampaignOperation();
  $operation->operand = $campaign;
  $operation->operator = 'SET';

  $operations = array($operation);

  // Make the mutate request.
  $result = $campaignService->mutate($operations);

  // Display result.
  $campaign = $result->value[0];
  printf("Campaign with ID '%s' was ".$ELIGIBLE_or_PAUSED."\n", $campaign->id);
}



function UpdateGoogleKeyword(AdWordsUser $user, $adGroupId, $criterionId,$url) {
  // To geto get keywords, run GetKeywords function
  // Get the service, which loads the required classes.
  $adGroupCriterionService =
      $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  // Create ad group criterion.
  $adGroupCriterion = new BiddableAdGroupCriterion();
  $adGroupCriterion->adGroupId = $adGroupId;
  // Create criterion using an existing ID. Use the base class Criterion
  // instead of Keyword to avoid having to set keyword-specific fields.
  $adGroupCriterion->criterion = new Criterion($criterionId);

  // Update destination URL.
  $adGroupCriterion->destinationUrl = $url;

  // Create operation.
  $operation = new AdGroupCriterionOperation();
  $operation->operand = $adGroupCriterion;
  $operation->operator = 'SET';

  $operations = array($operation);

  // Make the mutate request.
  $result = $adGroupCriterionService->mutate($operations);

  // Display result.
  $adGroupCriterion = $result->value[0];
  printf("Keyword with ID '%s' has updated destination URL '%s'.\n",
      $adGroupCriterion->criterion->id, $adGroupCriterion->destinationUrl);
  
   $updated_keyword_url =  $adGroupCriterion->criterion->id." ".$adGroupCriterion->destinationUrl;
   return $updated_keyword_url;
  
}
