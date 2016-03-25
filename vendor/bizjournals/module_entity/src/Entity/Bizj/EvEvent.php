<?php

namespace Entity\Bizj;

/**
 * EvEvent
 */
class EvEvent extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $event_id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $owner;

    /**
     * @var \DateTime
     */
    private $event_date = '0000-00-00';

    /**
     * @var string
     */
    private $start_time;

    /**
     * @var string
     */
    private $end_time;

    /**
     * @var integer
     */
    private $max_attendees = 0;

    /**
     * @var string
     */
    private $location_address;

    /**
     * @var string
     */
    private $location_city;

    /**
     * @var string
     */
    private $location_state;

    /**
     * @var string
     */
    private $location_zip;

    /**
     * @var string
     */
    private $contact_name;

    /**
     * @var string
     */
    private $contact_title;

    /**
     * @var string
     */
    private $contact_email;

    /**
     * @var string
     */
    private $contact_phone;

    /**
     * @var \DateTime
     */
    private $c_time = '0000-00-00 00:00:00';

    /**
     * @var string
     */
    private $teaser;

    /**
     * @var string
     */
    private $location_address_2;

    /**
     * @var string
     */
    private $dress_code;

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $cancel_policy;

    /**
     * @var boolean
     */
    private $admin_reg_notification = false;

    /**
     * @var \DateTime
     */
    private $m_time;

    /**
     * @var integer
     */
    private $expected_attendance;

    /**
     * @var integer
     */
    private $avg_past_attendance;

    /**
     * @var integer
     */
    private $number_years_held;

    /**
     * @var \DateTime
     */
    private $marketing_start_date;

    /**
     * @var integer
     */
    private $marketing_duration_in_weeks;

    /**
     * @var integer
     */
    private $nomination_id;

    /**
     * @var \DateTime
     */
    private $nomination_deadline;

    /**
     * @var string
     */
    private $nomination_description;

    /**
     * @var \DateTime
     */
    private $nomination_marketing_start_date;

    /**
     * @var integer
     */
    private $nomination_marketing_duration_in_weeks;

    /**
     * @var string
     */
    private $marketing_includes;

    /**
     * @var string
     */
    private $nomination_marketing_includes;

    /**
     * @var string
     */
    private $map_href;

    /**
     * @var integer
     */
    private $sort_order;

    /**
     * @var boolean
     */
    private $is_active = false;

    /**
     * @var boolean
     */
    private $is_soldout = false;

    /**
     * @var boolean
     */
    private $is_suspended = false;

    /**
     * @var boolean
     */
    private $is_cancelled = false;

    /**
     * @var boolean
     */
    private $is_invite_only = false;

    /**
     * @var boolean
     */
    private $close_registration = false;

    /**
     * @var boolean
     */
    private $has_admin_threshold_alert = false;

    /**
     * @var boolean
     */
    private $show_on_bizj_calendar = false;

    /**
     * @var boolean
     */
    private $has_nominations = false;

    /**
     * @var boolean
     */
    private $venue_can_support_autos = false;

    /**
     * @var boolean
     */
    private $has_sponsor_signage = false;

    /**
     * @var integer
     */
    private $sponsor_signage_type_id;

    /**
     * @var boolean
     */
    private $is_approx_date = false;

    /**
     * @var boolean
     */
    private $is_approx_time = false;

    /**
     * @var boolean
     */
    private $contact_only = false;

    /**
     * @var string
     */
    private $microsite_url;

    /**
     * @var boolean
     */
    private $prefer_microsite = false;

    /**
     * @var string
     */
    private $skin;

    /**
     * @var string
     */
    private $body_text;

    /**
     * @var boolean
     */
    private $has_sponsors = true;

    /**
     * @var boolean
     */
    private $has_single_sponsor_tier = false;

    /**
     * @var boolean
     */
    private $has_supplement = false;

    /**
     * @var boolean
     */
    private $is_supplement_handed_out = false;

    /**
     * @var \DateTime
     */
    private $supplement_deadline = '';

    /**
     * @var \DateTime
     */
    private $supplement_pub_date = '';

    /**
     * @var boolean
     */
    private $market_owned = false;

    /**
     * @var boolean
     */
    private $is_custom_event = false;

    /**
     * @var integer
     */
    private $event_type = 0;

    /**
     * @var string
     */
    private $custom_reminder_email;

    /**
     * @var boolean
     */
    private $is_brand_extension = false;

    /**
     * @var integer
     */
    private $brand_extension_year;

    /**
     * @var integer
     */
    private $brand_id;

    /**
     * @var integer
     */
    private $redirect_event_id;

    /**
     * @var \DateTime
     */
    private $sponsor_display_start_date;

    /**
     * @var \DateTime
     */
    private $sponsor_display_end_date;

    /**
     * @var string
     */
    private $admin_email;

    /**
     * @var string
     */
    private $shipping_address;

    /**
     * @var string
     */
    private $hashtag;

    /**
     * @var string
     */
    private $notes;

    /**
     * @var string
     */
    private $setup_time;

    /**
     * @var string
     */
    private $modified_by;

    /**
     * @var \DateTime
     */
    private $deleted_at;


    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return EvEvent
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set owner
     *
     * @param string $owner
     *
     * @return EvEvent
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;

        return $this;
    }

    /**
     * Get owner
     *
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return EvEvent
     */
    public function setEventDate($eventDate)
    {
        $this->event_date = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->event_date;
    }

    /**
     * Set startTime
     *
     * @param string $startTime
     *
     * @return EvEvent
     */
    public function setStartTime($startTime)
    {
        $this->start_time = $startTime;

        return $this;
    }

    /**
     * Get startTime
     *
     * @return string
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    /**
     * Set endTime
     *
     * @param string $endTime
     *
     * @return EvEvent
     */
    public function setEndTime($endTime)
    {
        $this->end_time = $endTime;

        return $this;
    }

    /**
     * Get endTime
     *
     * @return string
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    /**
     * Set maxAttendees
     *
     * @param integer $maxAttendees
     *
     * @return EvEvent
     */
    public function setMaxAttendees($maxAttendees)
    {
        $this->max_attendees = $maxAttendees;

        return $this;
    }

    /**
     * Get maxAttendees
     *
     * @return integer
     */
    public function getMaxAttendees()
    {
        return $this->max_attendees;
    }

    /**
     * Set locationAddress
     *
     * @param string $locationAddress
     *
     * @return EvEvent
     */
    public function setLocationAddress($locationAddress)
    {
        $this->location_address = $locationAddress;

        return $this;
    }

    /**
     * Get locationAddress
     *
     * @return string
     */
    public function getLocationAddress()
    {
        return $this->location_address;
    }

    /**
     * Set locationCity
     *
     * @param string $locationCity
     *
     * @return EvEvent
     */
    public function setLocationCity($locationCity)
    {
        $this->location_city = $locationCity;

        return $this;
    }

    /**
     * Get locationCity
     *
     * @return string
     */
    public function getLocationCity()
    {
        return $this->location_city;
    }

    /**
     * Set locationState
     *
     * @param string $locationState
     *
     * @return EvEvent
     */
    public function setLocationState($locationState)
    {
        $this->location_state = $locationState;

        return $this;
    }

    /**
     * Get locationState
     *
     * @return string
     */
    public function getLocationState()
    {
        return $this->location_state;
    }

    /**
     * Set locationZip
     *
     * @param string $locationZip
     *
     * @return EvEvent
     */
    public function setLocationZip($locationZip)
    {
        $this->location_zip = $locationZip;

        return $this;
    }

    /**
     * Get locationZip
     *
     * @return string
     */
    public function getLocationZip()
    {
        return $this->location_zip;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     *
     * @return EvEvent
     */
    public function setContactName($contactName)
    {
        $this->contact_name = $contactName;

        return $this;
    }

    /**
     * Get contactName
     *
     * @return string
     */
    public function getContactName()
    {
        return $this->contact_name;
    }

    /**
     * Set contactTitle
     *
     * @param string $contactTitle
     *
     * @return EvEvent
     */
    public function setContactTitle($contactTitle)
    {
        $this->contact_title = $contactTitle;

        return $this;
    }

    /**
     * Get contactTitle
     *
     * @return string
     */
    public function getContactTitle()
    {
        return $this->contact_title;
    }

    /**
     * Set contactEmail
     *
     * @param string $contactEmail
     *
     * @return EvEvent
     */
    public function setContactEmail($contactEmail)
    {
        $this->contact_email = $contactEmail;

        return $this;
    }

    /**
     * Get contactEmail
     *
     * @return string
     */
    public function getContactEmail()
    {
        return $this->contact_email;
    }

    /**
     * Set contactPhone
     *
     * @param string $contactPhone
     *
     * @return EvEvent
     */
    public function setContactPhone($contactPhone)
    {
        $this->contact_phone = $contactPhone;

        return $this;
    }

    /**
     * Get contactPhone
     *
     * @return string
     */
    public function getContactPhone()
    {
        return $this->contact_phone;
    }

    /**
     * Set cTime
     *
     * @param \DateTime $cTime
     *
     * @return EvEvent
     */
    public function setCTime($cTime)
    {
        $this->c_time = $cTime;

        return $this;
    }

    /**
     * Get cTime
     *
     * @return \DateTime
     */
    public function getCTime()
    {
        return $this->c_time;
    }

    /**
     * Set teaser
     *
     * @param string $teaser
     *
     * @return EvEvent
     */
    public function setTeaser($teaser)
    {
        $this->teaser = $teaser;

        return $this;
    }

    /**
     * Get teaser
     *
     * @return string
     */
    public function getTeaser()
    {
        return $this->teaser;
    }

    /**
     * Set locationAddress2
     *
     * @param string $locationAddress2
     *
     * @return EvEvent
     */
    public function setLocationAddress2($locationAddress2)
    {
        $this->location_address_2 = $locationAddress2;

        return $this;
    }

    /**
     * Get locationAddress2
     *
     * @return string
     */
    public function getLocationAddress2()
    {
        return $this->location_address_2;
    }

    /**
     * Set dressCode
     *
     * @param string $dressCode
     *
     * @return EvEvent
     */
    public function setDressCode($dressCode)
    {
        $this->dress_code = $dressCode;

        return $this;
    }

    /**
     * Get dressCode
     *
     * @return string
     */
    public function getDressCode()
    {
        return $this->dress_code;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return EvEvent
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set cancelPolicy
     *
     * @param string $cancelPolicy
     *
     * @return EvEvent
     */
    public function setCancelPolicy($cancelPolicy)
    {
        $this->cancel_policy = $cancelPolicy;

        return $this;
    }

    /**
     * Get cancelPolicy
     *
     * @return string
     */
    public function getCancelPolicy()
    {
        return $this->cancel_policy;
    }

    /**
     * Set adminRegNotification
     *
     * @param boolean $adminRegNotification
     *
     * @return EvEvent
     */
    public function setAdminRegNotification($adminRegNotification)
    {
        $this->admin_reg_notification = $adminRegNotification;

        return $this;
    }

    /**
     * Get adminRegNotification
     *
     * @return boolean
     */
    public function getAdminRegNotification()
    {
        return $this->admin_reg_notification;
    }

    /**
     * Set mTime
     *
     * @param \DateTime $mTime
     *
     * @return EvEvent
     */
    public function setMTime($mTime)
    {
        $this->m_time = $mTime;

        return $this;
    }

    /**
     * Get mTime
     *
     * @return \DateTime
     */
    public function getMTime()
    {
        return $this->m_time;
    }

    /**
     * Set expectedAttendance
     *
     * @param integer $expectedAttendance
     *
     * @return EvEvent
     */
    public function setExpectedAttendance($expectedAttendance)
    {
        $this->expected_attendance = $expectedAttendance;

        return $this;
    }

    /**
     * Get expectedAttendance
     *
     * @return integer
     */
    public function getExpectedAttendance()
    {
        return $this->expected_attendance;
    }

    /**
     * Set avgPastAttendance
     *
     * @param integer $avgPastAttendance
     *
     * @return EvEvent
     */
    public function setAvgPastAttendance($avgPastAttendance)
    {
        $this->avg_past_attendance = $avgPastAttendance;

        return $this;
    }

    /**
     * Get avgPastAttendance
     *
     * @return integer
     */
    public function getAvgPastAttendance()
    {
        return $this->avg_past_attendance;
    }

    /**
     * Set numberYearsHeld
     *
     * @param integer $numberYearsHeld
     *
     * @return EvEvent
     */
    public function setNumberYearsHeld($numberYearsHeld)
    {
        $this->number_years_held = $numberYearsHeld;

        return $this;
    }

    /**
     * Get numberYearsHeld
     *
     * @return integer
     */
    public function getNumberYearsHeld()
    {
        return $this->number_years_held;
    }

    /**
     * Set marketingStartDate
     *
     * @param \DateTime $marketingStartDate
     *
     * @return EvEvent
     */
    public function setMarketingStartDate($marketingStartDate)
    {
        $this->marketing_start_date = $marketingStartDate;

        return $this;
    }

    /**
     * Get marketingStartDate
     *
     * @return \DateTime
     */
    public function getMarketingStartDate()
    {
        return $this->marketing_start_date;
    }

    /**
     * Set marketingDurationInWeeks
     *
     * @param integer $marketingDurationInWeeks
     *
     * @return EvEvent
     */
    public function setMarketingDurationInWeeks($marketingDurationInWeeks)
    {
        $this->marketing_duration_in_weeks = $marketingDurationInWeeks;

        return $this;
    }

    /**
     * Get marketingDurationInWeeks
     *
     * @return integer
     */
    public function getMarketingDurationInWeeks()
    {
        return $this->marketing_duration_in_weeks;
    }

    /**
     * Set nominationId
     *
     * @param integer $nominationId
     *
     * @return EvEvent
     */
    public function setNominationId($nominationId)
    {
        $this->nomination_id = $nominationId;

        return $this;
    }

    /**
     * Get nominationId
     *
     * @return integer
     */
    public function getNominationId()
    {
        return $this->nomination_id;
    }

    /**
     * Set nominationDeadline
     *
     * @param \DateTime $nominationDeadline
     *
     * @return EvEvent
     */
    public function setNominationDeadline($nominationDeadline)
    {
        $this->nomination_deadline = $nominationDeadline;

        return $this;
    }

    /**
     * Get nominationDeadline
     *
     * @return \DateTime
     */
    public function getNominationDeadline()
    {
        return $this->nomination_deadline;
    }

    /**
     * Set nominationDescription
     *
     * @param string $nominationDescription
     *
     * @return EvEvent
     */
    public function setNominationDescription($nominationDescription)
    {
        $this->nomination_description = $nominationDescription;

        return $this;
    }

    /**
     * Get nominationDescription
     *
     * @return string
     */
    public function getNominationDescription()
    {
        return $this->nomination_description;
    }

    /**
     * Set nominationMarketingStartDate
     *
     * @param \DateTime $nominationMarketingStartDate
     *
     * @return EvEvent
     */
    public function setNominationMarketingStartDate($nominationMarketingStartDate)
    {
        $this->nomination_marketing_start_date = $nominationMarketingStartDate;

        return $this;
    }

    /**
     * Get nominationMarketingStartDate
     *
     * @return \DateTime
     */
    public function getNominationMarketingStartDate()
    {
        return $this->nomination_marketing_start_date;
    }

    /**
     * Set nominationMarketingDurationInWeeks
     *
     * @param integer $nominationMarketingDurationInWeeks
     *
     * @return EvEvent
     */
    public function setNominationMarketingDurationInWeeks($nominationMarketingDurationInWeeks)
    {
        $this->nomination_marketing_duration_in_weeks = $nominationMarketingDurationInWeeks;

        return $this;
    }

    /**
     * Get nominationMarketingDurationInWeeks
     *
     * @return integer
     */
    public function getNominationMarketingDurationInWeeks()
    {
        return $this->nomination_marketing_duration_in_weeks;
    }

    /**
     * Set marketingIncludes
     *
     * @param string $marketingIncludes
     *
     * @return EvEvent
     */
    public function setMarketingIncludes($marketingIncludes)
    {
        $this->marketing_includes = $marketingIncludes;

        return $this;
    }

    /**
     * Get marketingIncludes
     *
     * @return string
     */
    public function getMarketingIncludes()
    {
        return $this->marketing_includes;
    }

    /**
     * Set nominationMarketingIncludes
     *
     * @param string $nominationMarketingIncludes
     *
     * @return EvEvent
     */
    public function setNominationMarketingIncludes($nominationMarketingIncludes)
    {
        $this->nomination_marketing_includes = $nominationMarketingIncludes;

        return $this;
    }

    /**
     * Get nominationMarketingIncludes
     *
     * @return string
     */
    public function getNominationMarketingIncludes()
    {
        return $this->nomination_marketing_includes;
    }

    /**
     * Set mapHref
     *
     * @param string $mapHref
     *
     * @return EvEvent
     */
    public function setMapHref($mapHref)
    {
        $this->map_href = $mapHref;

        return $this;
    }

    /**
     * Get mapHref
     *
     * @return string
     */
    public function getMapHref()
    {
        return $this->map_href;
    }

    /**
     * Set sortOrder
     *
     * @param integer $sortOrder
     *
     * @return EvEvent
     */
    public function setSortOrder($sortOrder)
    {
        $this->sort_order = $sortOrder;

        return $this;
    }

    /**
     * Get sortOrder
     *
     * @return integer
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return EvEvent
     */
    public function setIsActive($isActive)
    {
        $this->is_active = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->is_active;
    }

    /**
     * Set isSoldout
     *
     * @param boolean $isSoldout
     *
     * @return EvEvent
     */
    public function setIsSoldout($isSoldout)
    {
        $this->is_soldout = $isSoldout;

        return $this;
    }

    /**
     * Get isSoldout
     *
     * @return boolean
     */
    public function getIsSoldout()
    {
        return $this->is_soldout;
    }

    /**
     * Set isSuspended
     *
     * @param boolean $isSuspended
     *
     * @return EvEvent
     */
    public function setIsSuspended($isSuspended)
    {
        $this->is_suspended = $isSuspended;

        return $this;
    }

    /**
     * Get isSuspended
     *
     * @return boolean
     */
    public function getIsSuspended()
    {
        return $this->is_suspended;
    }

    /**
     * Set isCancelled
     *
     * @param boolean $isCancelled
     *
     * @return EvEvent
     */
    public function setIsCancelled($isCancelled)
    {
        $this->is_cancelled = $isCancelled;

        return $this;
    }

    /**
     * Get isCancelled
     *
     * @return boolean
     */
    public function getIsCancelled()
    {
        return $this->is_cancelled;
    }

    /**
     * Set isInviteOnly
     *
     * @param boolean $isInviteOnly
     *
     * @return EvEvent
     */
    public function setIsInviteOnly($isInviteOnly)
    {
        $this->is_invite_only = $isInviteOnly;

        return $this;
    }

    /**
     * Get isInviteOnly
     *
     * @return boolean
     */
    public function getIsInviteOnly()
    {
        return $this->is_invite_only;
    }

    /**
     * Set closeRegistration
     *
     * @param boolean $closeRegistration
     *
     * @return EvEvent
     */
    public function setCloseRegistration($closeRegistration)
    {
        $this->close_registration = $closeRegistration;

        return $this;
    }

    /**
     * Get closeRegistration
     *
     * @return boolean
     */
    public function getCloseRegistration()
    {
        return $this->close_registration;
    }

    /**
     * Set hasAdminThresholdAlert
     *
     * @param boolean $hasAdminThresholdAlert
     *
     * @return EvEvent
     */
    public function setHasAdminThresholdAlert($hasAdminThresholdAlert)
    {
        $this->has_admin_threshold_alert = $hasAdminThresholdAlert;

        return $this;
    }

    /**
     * Get hasAdminThresholdAlert
     *
     * @return boolean
     */
    public function getHasAdminThresholdAlert()
    {
        return $this->has_admin_threshold_alert;
    }

    /**
     * Set showOnBizjCalendar
     *
     * @param boolean $showOnBizjCalendar
     *
     * @return EvEvent
     */
    public function setShowOnBizjCalendar($showOnBizjCalendar)
    {
        $this->show_on_bizj_calendar = $showOnBizjCalendar;

        return $this;
    }

    /**
     * Get showOnBizjCalendar
     *
     * @return boolean
     */
    public function getShowOnBizjCalendar()
    {
        return $this->show_on_bizj_calendar;
    }

    /**
     * Set hasNominations
     *
     * @param boolean $hasNominations
     *
     * @return EvEvent
     */
    public function setHasNominations($hasNominations)
    {
        $this->has_nominations = $hasNominations;

        return $this;
    }

    /**
     * Get hasNominations
     *
     * @return boolean
     */
    public function getHasNominations()
    {
        return $this->has_nominations;
    }

    /**
     * Set venueCanSupportAutos
     *
     * @param boolean $venueCanSupportAutos
     *
     * @return EvEvent
     */
    public function setVenueCanSupportAutos($venueCanSupportAutos)
    {
        $this->venue_can_support_autos = $venueCanSupportAutos;

        return $this;
    }

    /**
     * Get venueCanSupportAutos
     *
     * @return boolean
     */
    public function getVenueCanSupportAutos()
    {
        return $this->venue_can_support_autos;
    }

    /**
     * Set hasSponsorSignage
     *
     * @param boolean $hasSponsorSignage
     *
     * @return EvEvent
     */
    public function setHasSponsorSignage($hasSponsorSignage)
    {
        $this->has_sponsor_signage = $hasSponsorSignage;

        return $this;
    }

    /**
     * Get hasSponsorSignage
     *
     * @return boolean
     */
    public function getHasSponsorSignage()
    {
        return $this->has_sponsor_signage;
    }

    /**
     * Set sponsorSignageTypeId
     *
     * @param integer $sponsorSignageTypeId
     *
     * @return EvEvent
     */
    public function setSponsorSignageTypeId($sponsorSignageTypeId)
    {
        $this->sponsor_signage_type_id = $sponsorSignageTypeId;

        return $this;
    }

    /**
     * Get sponsorSignageTypeId
     *
     * @return integer
     */
    public function getSponsorSignageTypeId()
    {
        return $this->sponsor_signage_type_id;
    }

    /**
     * Set isApproxDate
     *
     * @param boolean $isApproxDate
     *
     * @return EvEvent
     */
    public function setIsApproxDate($isApproxDate)
    {
        $this->is_approx_date = $isApproxDate;

        return $this;
    }

    /**
     * Get isApproxDate
     *
     * @return boolean
     */
    public function getIsApproxDate()
    {
        return $this->is_approx_date;
    }

    /**
     * Set isApproxTime
     *
     * @param boolean $isApproxTime
     *
     * @return EvEvent
     */
    public function setIsApproxTime($isApproxTime)
    {
        $this->is_approx_time = $isApproxTime;

        return $this;
    }

    /**
     * Get isApproxTime
     *
     * @return boolean
     */
    public function getIsApproxTime()
    {
        return $this->is_approx_time;
    }

    /**
     * Set contactOnly
     *
     * @param boolean $contactOnly
     *
     * @return EvEvent
     */
    public function setContactOnly($contactOnly)
    {
        $this->contact_only = $contactOnly;

        return $this;
    }

    /**
     * Get contactOnly
     *
     * @return boolean
     */
    public function getContactOnly()
    {
        return $this->contact_only;
    }

    /**
     * Set micrositeUrl
     *
     * @param string $micrositeUrl
     *
     * @return EvEvent
     */
    public function setMicrositeUrl($micrositeUrl)
    {
        $this->microsite_url = $micrositeUrl;

        return $this;
    }

    /**
     * Get micrositeUrl
     *
     * @return string
     */
    public function getMicrositeUrl()
    {
        return $this->microsite_url;
    }

    /**
     * Set preferMicrosite
     *
     * @param boolean $preferMicrosite
     *
     * @return EvEvent
     */
    public function setPreferMicrosite($preferMicrosite)
    {
        $this->prefer_microsite = $preferMicrosite;

        return $this;
    }

    /**
     * Get preferMicrosite
     *
     * @return boolean
     */
    public function getPreferMicrosite()
    {
        return $this->prefer_microsite;
    }

    /**
     * Set skin
     *
     * @param string $skin
     *
     * @return EvEvent
     */
    public function setSkin($skin)
    {
        $this->skin = $skin;

        return $this;
    }

    /**
     * Get skin
     *
     * @return string
     */
    public function getSkin()
    {
        return $this->skin;
    }

    /**
     * Set bodyText
     *
     * @param string $bodyText
     *
     * @return EvEvent
     */
    public function setBodyText($bodyText)
    {
        $this->body_text = $bodyText;

        return $this;
    }

    /**
     * Get bodyText
     *
     * @return string
     */
    public function getBodyText()
    {
        return $this->body_text;
    }

    /**
     * Set hasSponsors
     *
     * @param boolean $hasSponsors
     *
     * @return EvEvent
     */
    public function setHasSponsors($hasSponsors)
    {
        $this->has_sponsors = $hasSponsors;

        return $this;
    }

    /**
     * Get hasSponsors
     *
     * @return boolean
     */
    public function getHasSponsors()
    {
        return $this->has_sponsors;
    }

    /**
     * Set hasSingleSponsorTier
     *
     * @param boolean $hasSingleSponsorTier
     *
     * @return EvEvent
     */
    public function setHasSingleSponsorTier($hasSingleSponsorTier)
    {
        $this->has_single_sponsor_tier = $hasSingleSponsorTier;

        return $this;
    }

    /**
     * Get hasSingleSponsorTier
     *
     * @return boolean
     */
    public function getHasSingleSponsorTier()
    {
        return $this->has_single_sponsor_tier;
    }

    /**
     * Set hasSupplement
     *
     * @param boolean $hasSupplement
     *
     * @return EvEvent
     */
    public function setHasSupplement($hasSupplement)
    {
        $this->has_supplement = $hasSupplement;

        return $this;
    }

    /**
     * Get hasSupplement
     *
     * @return boolean
     */
    public function getHasSupplement()
    {
        return $this->has_supplement;
    }

    /**
     * Set isSupplementHandedOut
     *
     * @param boolean $isSupplementHandedOut
     *
     * @return EvEvent
     */
    public function setIsSupplementHandedOut($isSupplementHandedOut)
    {
        $this->is_supplement_handed_out = $isSupplementHandedOut;

        return $this;
    }

    /**
     * Get isSupplementHandedOut
     *
     * @return boolean
     */
    public function getIsSupplementHandedOut()
    {
        return $this->is_supplement_handed_out;
    }

    /**
     * Set supplementDeadline
     *
     * @param \DateTime $supplementDeadline
     *
     * @return EvEvent
     */
    public function setSupplementDeadline($supplementDeadline)
    {
        $this->supplement_deadline = $supplementDeadline;

        return $this;
    }

    /**
     * Get supplementDeadline
     *
     * @return \DateTime
     */
    public function getSupplementDeadline()
    {
        return $this->supplement_deadline;
    }

    /**
     * Set supplementPubDate
     *
     * @param \DateTime $supplementPubDate
     *
     * @return EvEvent
     */
    public function setSupplementPubDate($supplementPubDate)
    {
        $this->supplement_pub_date = $supplementPubDate;

        return $this;
    }

    /**
     * Get supplementPubDate
     *
     * @return \DateTime
     */
    public function getSupplementPubDate()
    {
        return $this->supplement_pub_date;
    }

    /**
     * Set marketOwned
     *
     * @param boolean $marketOwned
     *
     * @return EvEvent
     */
    public function setMarketOwned($marketOwned)
    {
        $this->market_owned = $marketOwned;

        return $this;
    }

    /**
     * Get marketOwned
     *
     * @return boolean
     */
    public function getMarketOwned()
    {
        return $this->market_owned;
    }

    /**
     * Set isCustomEvent
     *
     * @param boolean $isCustomEvent
     *
     * @return EvEvent
     */
    public function setIsCustomEvent($isCustomEvent)
    {
        $this->is_custom_event = $isCustomEvent;

        return $this;
    }

    /**
     * Get isCustomEvent
     *
     * @return boolean
     */
    public function getIsCustomEvent()
    {
        return $this->is_custom_event;
    }

    /**
     * Set eventType
     *
     * @param integer $eventType
     *
     * @return EvEvent
     */
    public function setEventType($eventType)
    {
        $this->event_type = $eventType;

        return $this;
    }

    /**
     * Get eventType
     *
     * @return integer
     */
    public function getEventType()
    {
        return $this->event_type;
    }

    /**
     * Set customReminderEmail
     *
     * @param string $customReminderEmail
     *
     * @return EvEvent
     */
    public function setCustomReminderEmail($customReminderEmail)
    {
        $this->custom_reminder_email = $customReminderEmail;

        return $this;
    }

    /**
     * Get customReminderEmail
     *
     * @return string
     */
    public function getCustomReminderEmail()
    {
        return $this->custom_reminder_email;
    }

    /**
     * Set isBrandExtension
     *
     * @param boolean $isBrandExtension
     *
     * @return EvEvent
     */
    public function setIsBrandExtension($isBrandExtension)
    {
        $this->is_brand_extension = $isBrandExtension;

        return $this;
    }

    /**
     * Get isBrandExtension
     *
     * @return boolean
     */
    public function getIsBrandExtension()
    {
        return $this->is_brand_extension;
    }

    /**
     * Set brandExtensionYear
     *
     * @param integer $brandExtensionYear
     *
     * @return EvEvent
     */
    public function setBrandExtensionYear($brandExtensionYear)
    {
        $this->brand_extension_year = $brandExtensionYear;

        return $this;
    }

    /**
     * Get brandExtensionYear
     *
     * @return integer
     */
    public function getBrandExtensionYear()
    {
        return $this->brand_extension_year;
    }

    /**
     * Set brandId
     *
     * @param integer $brandId
     *
     * @return EvEvent
     */
    public function setBrandId($brandId)
    {
        $this->brand_id = $brandId;

        return $this;
    }

    /**
     * Get brandId
     *
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * Set redirectEventId
     *
     * @param integer $redirectEventId
     *
     * @return EvEvent
     */
    public function setRedirectEventId($redirectEventId)
    {
        $this->redirect_event_id = $redirectEventId;

        return $this;
    }

    /**
     * Get redirectEventId
     *
     * @return integer
     */
    public function getRedirectEventId()
    {
        return $this->redirect_event_id;
    }

    /**
     * Set sponsorDisplayStartDate
     *
     * @param \DateTime $sponsorDisplayStartDate
     *
     * @return EvEvent
     */
    public function setSponsorDisplayStartDate($sponsorDisplayStartDate)
    {
        $this->sponsor_display_start_date = $sponsorDisplayStartDate;

        return $this;
    }

    /**
     * Get sponsorDisplayStartDate
     *
     * @return \DateTime
     */
    public function getSponsorDisplayStartDate()
    {
        return $this->sponsor_display_start_date;
    }

    /**
     * Set sponsorDisplayEndDate
     *
     * @param \DateTime $sponsorDisplayEndDate
     *
     * @return EvEvent
     */
    public function setSponsorDisplayEndDate($sponsorDisplayEndDate)
    {
        $this->sponsor_display_end_date = $sponsorDisplayEndDate;

        return $this;
    }

    /**
     * Get sponsorDisplayEndDate
     *
     * @return \DateTime
     */
    public function getSponsorDisplayEndDate()
    {
        return $this->sponsor_display_end_date;
    }

    /**
     * Set adminEmail
     *
     * @param string $adminEmail
     *
     * @return EvEvent
     */
    public function setAdminEmail($adminEmail)
    {
        $this->admin_email = $adminEmail;

        return $this;
    }

    /**
     * Get adminEmail
     *
     * @return string
     */
    public function getAdminEmail()
    {
        return $this->admin_email;
    }

    /**
     * Set shippingAddress
     *
     * @param string $shippingAddress
     *
     * @return EvEvent
     */
    public function setShippingAddress($shippingAddress)
    {
        $this->shipping_address = $shippingAddress;

        return $this;
    }

    /**
     * Get shippingAddress
     *
     * @return string
     */
    public function getShippingAddress()
    {
        return $this->shipping_address;
    }

    /**
     * Set hashtag
     *
     * @param string $hashtag
     *
     * @return EvEvent
     */
    public function setHashtag($hashtag)
    {
        $this->hashtag = $hashtag;

        return $this;
    }

    /**
     * Get hashtag
     *
     * @return string
     */
    public function getHashtag()
    {
        return $this->hashtag;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return EvEvent
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set setupTime
     *
     * @param string $setupTime
     *
     * @return EvEvent
     */
    public function setSetupTime($setupTime)
    {
        $this->setup_time = $setupTime;

        return $this;
    }

    /**
     * Get setupTime
     *
     * @return string
     */
    public function getSetupTime()
    {
        return $this->setup_time;
    }

    /**
     * Set modifiedBy
     *
     * @param string $modifiedBy
     *
     * @return EvEvent
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modified_by = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return EvEvent
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deleted_at = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }
}

