<?php
require_once '../base/OG_AE_channel_1.php';
require_once './OG_AE_adwords_base.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OG_AE_adwords_channel
 *
 * @author shashank
 */
class OG_AE_adwords_channel extends OG_AE_adwords_base implements OG_AE_channel_1{
    private $campaign;
    private $campaign_id;
    private $capaign_data = array();


    public function getCampaignId()
    {
        return $this->campaign_id;
    }
    
    public function setCampaignId($campaign_id)
    {
        return $this->campaign_id = $campaign_id;
    }
    
    public function getCampaign()
    {
        return $this->campaign;
    }
    
    public function setCampaign(OG_AE_campaign $capaign )
    {
        return $this->campaign = $capaign;
    }
    
    public function createCampaign() 
    {
        
    }
    
    public function readCampaign() 
    {
        
    }
    
    public function updateCampaign() 
    {
        
    }
    
    public function deleteCampaign() 
    {
        
    }
}
