<?php
require_once './OG_AE_adgroups.php';
require_once './OG_AE_ads.php';
require_once './OG_AE_auth.php';
require_once './OG_AE_base.php';
require_once './OG_AE_campaigns.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * OG_AE_base
 * OfferGrid API Engine Base Class
 * Provides an interface to be implemented by different channels
 *
 * @category ChannelManagement
 * @package OG_AE_Channel
 * @author shashank
 * @author girish
 */

interface OG_AE_channel_1 extends OG_AE_base, OG_AE_adgroups, OG_AE_ads, OG_AE_auth, OG_AE_campaigns{
    
}