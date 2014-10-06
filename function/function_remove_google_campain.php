<?php

require_once dirname(__FILE__) . '/init.php';

function RemoveGoogleCampaign(AdWordsUser $user, $campaignId) {
  // Get the service, which loads the required classes.
  $campaignService = $user->GetService('CampaignService', ADWORDS_VERSION);

  // Create campaign with REMOVED status.
  $campaign = new Campaign();
  $campaign->id = $campaignId;
  $campaign->status = 'REMOVED';

  // Create operations.
  $operation = new CampaignOperation();
  $operation->operand = $campaign;
  $operation->operator = 'SET';

  $operations = array($operation);

  // Make the mutate request.
  $result = $campaignService->mutate($operations);

  // Display result.
  $campaign = $result->value[0];
  //printf("Campaign with ID '%d' was removed.\n", $campaign->id);
  return $campaign->id;
}


//------------------------------------------------------------------------------


function RemoveGoogleAdGroup(AdWordsUser $user, $adGroupId) {
  // Get the service, which loads the required classes.
  $adGroupService = $user->GetService('AdGroupService', ADWORDS_VERSION);

  // Create ad group with REMOVED status.
  $adGroup = new AdGroup();
  $adGroup->id = $adGroupId;
  $adGroup->status = 'REMOVED';

  // Create operations.
  $operation = new AdGroupOperation();
  $operation->operand = $adGroup;
  $operation->operator = 'SET';

  $operations = array($operation);

  // Make the mutate request.
  $result = $adGroupService->mutate($operations);

  // Display result.
  $adGroup = $result->value[0];
  printf("Ad group with ID '%d' was removed.\n", $adGroup->id);
}


//------------------------------------------------------------------------------


function RemoveGoogleAd(AdWordsUser $user, $adGroupId, $adId) {
  // Get the service, which loads the required classes.
  $adGroupAdService = $user->GetService('AdGroupAdService', ADWORDS_VERSION);

  // Create base class ad to avoid setting type specific fields.
  $ad = new Ad();
  $ad->id = $adId;

  // Create ad group ad.
  $adGroupAd = new AdGroupAd();
  $adGroupAd->adGroupId = $adGroupId;
  $adGroupAd->ad = $ad;

  // Create operation.
  $operation = new AdGroupAdOperation();
  $operation->operand = $adGroupAd;
  $operation->operator = 'REMOVE';

  $operations = array($operation);

  // Make the mutate request.
  $result = $adGroupAdService->mutate($operations);

  // Display result.
  $adGroupAd = $result->value[0];
  printf("Ad with ID '%d' was removed.\n", $adGroupAd->ad->id);
}

//-----------------------------------------------------------------------------


function RemoveGoogleKeyword(AdWordsUser $user, $adGroupId, $criterionId) {
  // Get the service, which loads the required classes.
  $adGroupCriterionService =
      $user->GetService('AdGroupCriterionService', ADWORDS_VERSION);

  // Create criterion using an existing ID. Use the base class Criterion
  // instead of Keyword to avoid having to set keyword-specific fields.
  $criterion = new Criterion();
  $criterion->id = $criterionId;

  // Create ad group criterion.
  $adGroupCriterion = new AdGroupCriterion();
  $adGroupCriterion->adGroupId = $adGroupId;
  $adGroupCriterion->criterion = new Criterion($criterionId);

  // Create operation.
  $operation = new AdGroupCriterionOperation();
  $operation->operand = $adGroupCriterion;
  $operation->operator = 'REMOVE';

  $operations = array($operation);

  // Make the mutate request.
  $result = $adGroupCriterionService->mutate($operations);

  // Display result.
  $adGroupCriterion = $result->value[0];
  printf("Keyword with ID '%d' was removed.\n",
      $adGroupCriterion->criterion->id);
}
