<?php

namespace Entity\Bizj;

/**
 * ContactData
 */
class ContactData extends \Entity\Entity\Base
{
    /**
     * @var integer
     */
    private $contact_id;

    /**
     * @var string
     */
    private $backlink_class;

    /**
     * @var integer
     */
    private $backlink_id;

    /**
     * @var string
     */
    private $contact_type;

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
    private $contact_description;

    /**
     * @var string
     */
    private $address1;

    /**
     * @var string
     */
    private $address2;

    /**
     * @var string
     */
    private $address3;

    /**
     * @var string
     */
    private $community;

    /**
     * @var string
     */
    private $state_province;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $postal_code;

    /**
     * @var string
     */
    private $phone1;

    /**
     * @var string
     */
    private $phone1_type;

    /**
     * @var string
     */
    private $phone1_notes;

    /**
     * @var string
     */
    private $phone2;

    /**
     * @var string
     */
    private $phone2_type;

    /**
     * @var string
     */
    private $phone2_notes;

    /**
     * @var string
     */
    private $phone3;

    /**
     * @var string
     */
    private $phone3_type;

    /**
     * @var string
     */
    private $phone3_notes;

    /**
     * @var string
     */
    private $email1;

    /**
     * @var string
     */
    private $email1_notes;

    /**
     * @var string
     */
    private $email2;

    /**
     * @var string
     */
    private $email2_notes;

    /**
     * @var string
     */
    private $email3;

    /**
     * @var string
     */
    private $email3_notes;

    /**
     * @var string
     */
    private $social1;

    /**
     * @var string
     */
    private $social1_type;

    /**
     * @var string
     */
    private $social1_notes;

    /**
     * @var string
     */
    private $social2;

    /**
     * @var string
     */
    private $social2_type;

    /**
     * @var string
     */
    private $social2_notes;

    /**
     * @var string
     */
    private $social3;

    /**
     * @var string
     */
    private $social3_type;

    /**
     * @var string
     */
    private $social3_notes;

    /**
     * @var integer
     */
    private $headshot_media_id;

    /**
     * @var string
     */
    private $photo_headshot_url;

    /**
     * @var string
     */
    private $photo_social_url;

    /**
     * @var string
     */
    private $contact_subtype;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Staff;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Staff = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get contactId
     *
     * @return integer
     */
    public function getContactId()
    {
        return $this->contact_id;
    }

    /**
     * Set backlinkClass
     *
     * @param string $backlinkClass
     *
     * @return ContactData
     */
    public function setBacklinkClass($backlinkClass)
    {
        $this->backlink_class = $backlinkClass;

        return $this;
    }

    /**
     * Get backlinkClass
     *
     * @return string
     */
    public function getBacklinkClass()
    {
        return $this->backlink_class;
    }

    /**
     * Set backlinkId
     *
     * @param integer $backlinkId
     *
     * @return ContactData
     */
    public function setBacklinkId($backlinkId)
    {
        $this->backlink_id = $backlinkId;

        return $this;
    }

    /**
     * Get backlinkId
     *
     * @return integer
     */
    public function getBacklinkId()
    {
        return $this->backlink_id;
    }

    /**
     * Set contactType
     *
     * @param string $contactType
     *
     * @return ContactData
     */
    public function setContactType($contactType)
    {
        $this->contact_type = $contactType;

        return $this;
    }

    /**
     * Get contactType
     *
     * @return string
     */
    public function getContactType()
    {
        return $this->contact_type;
    }

    /**
     * Set contactName
     *
     * @param string $contactName
     *
     * @return ContactData
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
     * @return ContactData
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
     * Set contactDescription
     *
     * @param string $contactDescription
     *
     * @return ContactData
     */
    public function setContactDescription($contactDescription)
    {
        $this->contact_description = $contactDescription;

        return $this;
    }

    /**
     * Get contactDescription
     *
     * @return string
     */
    public function getContactDescription()
    {
        return $this->contact_description;
    }

    /**
     * Set address1
     *
     * @param string $address1
     *
     * @return ContactData
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     *
     * @return ContactData
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set address3
     *
     * @param string $address3
     *
     * @return ContactData
     */
    public function setAddress3($address3)
    {
        $this->address3 = $address3;

        return $this;
    }

    /**
     * Get address3
     *
     * @return string
     */
    public function getAddress3()
    {
        return $this->address3;
    }

    /**
     * Set community
     *
     * @param string $community
     *
     * @return ContactData
     */
    public function setCommunity($community)
    {
        $this->community = $community;

        return $this;
    }

    /**
     * Get community
     *
     * @return string
     */
    public function getCommunity()
    {
        return $this->community;
    }

    /**
     * Set stateProvince
     *
     * @param string $stateProvince
     *
     * @return ContactData
     */
    public function setStateProvince($stateProvince)
    {
        $this->state_province = $stateProvince;

        return $this;
    }

    /**
     * Get stateProvince
     *
     * @return string
     */
    public function getStateProvince()
    {
        return $this->state_province;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return ContactData
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postalCode
     *
     * @param string $postalCode
     *
     * @return ContactData
     */
    public function setPostalCode($postalCode)
    {
        $this->postal_code = $postalCode;

        return $this;
    }

    /**
     * Get postalCode
     *
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postal_code;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     *
     * @return ContactData
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone1Type
     *
     * @param string $phone1Type
     *
     * @return ContactData
     */
    public function setPhone1Type($phone1Type)
    {
        $this->phone1_type = $phone1Type;

        return $this;
    }

    /**
     * Get phone1Type
     *
     * @return string
     */
    public function getPhone1Type()
    {
        return $this->phone1_type;
    }

    /**
     * Set phone1Notes
     *
     * @param string $phone1Notes
     *
     * @return ContactData
     */
    public function setPhone1Notes($phone1Notes)
    {
        $this->phone1_notes = $phone1Notes;

        return $this;
    }

    /**
     * Get phone1Notes
     *
     * @return string
     */
    public function getPhone1Notes()
    {
        return $this->phone1_notes;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     *
     * @return ContactData
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone2Type
     *
     * @param string $phone2Type
     *
     * @return ContactData
     */
    public function setPhone2Type($phone2Type)
    {
        $this->phone2_type = $phone2Type;

        return $this;
    }

    /**
     * Get phone2Type
     *
     * @return string
     */
    public function getPhone2Type()
    {
        return $this->phone2_type;
    }

    /**
     * Set phone2Notes
     *
     * @param string $phone2Notes
     *
     * @return ContactData
     */
    public function setPhone2Notes($phone2Notes)
    {
        $this->phone2_notes = $phone2Notes;

        return $this;
    }

    /**
     * Get phone2Notes
     *
     * @return string
     */
    public function getPhone2Notes()
    {
        return $this->phone2_notes;
    }

    /**
     * Set phone3
     *
     * @param string $phone3
     *
     * @return ContactData
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3
     *
     * @return string
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    /**
     * Set phone3Type
     *
     * @param string $phone3Type
     *
     * @return ContactData
     */
    public function setPhone3Type($phone3Type)
    {
        $this->phone3_type = $phone3Type;

        return $this;
    }

    /**
     * Get phone3Type
     *
     * @return string
     */
    public function getPhone3Type()
    {
        return $this->phone3_type;
    }

    /**
     * Set phone3Notes
     *
     * @param string $phone3Notes
     *
     * @return ContactData
     */
    public function setPhone3Notes($phone3Notes)
    {
        $this->phone3_notes = $phone3Notes;

        return $this;
    }

    /**
     * Get phone3Notes
     *
     * @return string
     */
    public function getPhone3Notes()
    {
        return $this->phone3_notes;
    }

    /**
     * Set email1
     *
     * @param string $email1
     *
     * @return ContactData
     */
    public function setEmail1($email1)
    {
        $this->email1 = $email1;

        return $this;
    }

    /**
     * Get email1
     *
     * @return string
     */
    public function getEmail1()
    {
        return $this->email1;
    }

    /**
     * Set email1Notes
     *
     * @param string $email1Notes
     *
     * @return ContactData
     */
    public function setEmail1Notes($email1Notes)
    {
        $this->email1_notes = $email1Notes;

        return $this;
    }

    /**
     * Get email1Notes
     *
     * @return string
     */
    public function getEmail1Notes()
    {
        return $this->email1_notes;
    }

    /**
     * Set email2
     *
     * @param string $email2
     *
     * @return ContactData
     */
    public function setEmail2($email2)
    {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get email2
     *
     * @return string
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Set email2Notes
     *
     * @param string $email2Notes
     *
     * @return ContactData
     */
    public function setEmail2Notes($email2Notes)
    {
        $this->email2_notes = $email2Notes;

        return $this;
    }

    /**
     * Get email2Notes
     *
     * @return string
     */
    public function getEmail2Notes()
    {
        return $this->email2_notes;
    }

    /**
     * Set email3
     *
     * @param string $email3
     *
     * @return ContactData
     */
    public function setEmail3($email3)
    {
        $this->email3 = $email3;

        return $this;
    }

    /**
     * Get email3
     *
     * @return string
     */
    public function getEmail3()
    {
        return $this->email3;
    }

    /**
     * Set email3Notes
     *
     * @param string $email3Notes
     *
     * @return ContactData
     */
    public function setEmail3Notes($email3Notes)
    {
        $this->email3_notes = $email3Notes;

        return $this;
    }

    /**
     * Get email3Notes
     *
     * @return string
     */
    public function getEmail3Notes()
    {
        return $this->email3_notes;
    }

    /**
     * Set social1
     *
     * @param string $social1
     *
     * @return ContactData
     */
    public function setSocial1($social1)
    {
        $this->social1 = $social1;

        return $this;
    }

    /**
     * Get social1
     *
     * @return string
     */
    public function getSocial1()
    {
        return $this->social1;
    }

    /**
     * Set social1Type
     *
     * @param string $social1Type
     *
     * @return ContactData
     */
    public function setSocial1Type($social1Type)
    {
        $this->social1_type = $social1Type;

        return $this;
    }

    /**
     * Get social1Type
     *
     * @return string
     */
    public function getSocial1Type()
    {
        return $this->social1_type;
    }

    /**
     * Set social1Notes
     *
     * @param string $social1Notes
     *
     * @return ContactData
     */
    public function setSocial1Notes($social1Notes)
    {
        $this->social1_notes = $social1Notes;

        return $this;
    }

    /**
     * Get social1Notes
     *
     * @return string
     */
    public function getSocial1Notes()
    {
        return $this->social1_notes;
    }

    /**
     * Set social2
     *
     * @param string $social2
     *
     * @return ContactData
     */
    public function setSocial2($social2)
    {
        $this->social2 = $social2;

        return $this;
    }

    /**
     * Get social2
     *
     * @return string
     */
    public function getSocial2()
    {
        return $this->social2;
    }

    /**
     * Set social2Type
     *
     * @param string $social2Type
     *
     * @return ContactData
     */
    public function setSocial2Type($social2Type)
    {
        $this->social2_type = $social2Type;

        return $this;
    }

    /**
     * Get social2Type
     *
     * @return string
     */
    public function getSocial2Type()
    {
        return $this->social2_type;
    }

    /**
     * Set social2Notes
     *
     * @param string $social2Notes
     *
     * @return ContactData
     */
    public function setSocial2Notes($social2Notes)
    {
        $this->social2_notes = $social2Notes;

        return $this;
    }

    /**
     * Get social2Notes
     *
     * @return string
     */
    public function getSocial2Notes()
    {
        return $this->social2_notes;
    }

    /**
     * Set social3
     *
     * @param string $social3
     *
     * @return ContactData
     */
    public function setSocial3($social3)
    {
        $this->social3 = $social3;

        return $this;
    }

    /**
     * Get social3
     *
     * @return string
     */
    public function getSocial3()
    {
        return $this->social3;
    }

    /**
     * Set social3Type
     *
     * @param string $social3Type
     *
     * @return ContactData
     */
    public function setSocial3Type($social3Type)
    {
        $this->social3_type = $social3Type;

        return $this;
    }

    /**
     * Get social3Type
     *
     * @return string
     */
    public function getSocial3Type()
    {
        return $this->social3_type;
    }

    /**
     * Set social3Notes
     *
     * @param string $social3Notes
     *
     * @return ContactData
     */
    public function setSocial3Notes($social3Notes)
    {
        $this->social3_notes = $social3Notes;

        return $this;
    }

    /**
     * Get social3Notes
     *
     * @return string
     */
    public function getSocial3Notes()
    {
        return $this->social3_notes;
    }

    /**
     * Set headshotMediaId
     *
     * @param integer $headshotMediaId
     *
     * @return ContactData
     */
    public function setHeadshotMediaId($headshotMediaId)
    {
        $this->headshot_media_id = $headshotMediaId;

        return $this;
    }

    /**
     * Get headshotMediaId
     *
     * @return integer
     */
    public function getHeadshotMediaId()
    {
        return $this->headshot_media_id;
    }

    /**
     * Set photoHeadshotUrl
     *
     * @param string $photoHeadshotUrl
     *
     * @return ContactData
     */
    public function setPhotoHeadshotUrl($photoHeadshotUrl)
    {
        $this->photo_headshot_url = $photoHeadshotUrl;

        return $this;
    }

    /**
     * Get photoHeadshotUrl
     *
     * @return string
     */
    public function getPhotoHeadshotUrl()
    {
        return $this->photo_headshot_url;
    }

    /**
     * Set photoSocialUrl
     *
     * @param string $photoSocialUrl
     *
     * @return ContactData
     */
    public function setPhotoSocialUrl($photoSocialUrl)
    {
        $this->photo_social_url = $photoSocialUrl;

        return $this;
    }

    /**
     * Get photoSocialUrl
     *
     * @return string
     */
    public function getPhotoSocialUrl()
    {
        return $this->photo_social_url;
    }

    /**
     * Set contactSubtype
     *
     * @param string $contactSubtype
     *
     * @return ContactData
     */
    public function setContactSubtype($contactSubtype)
    {
        $this->contact_subtype = $contactSubtype;

        return $this;
    }

    /**
     * Get contactSubtype
     *
     * @return string
     */
    public function getContactSubtype()
    {
        return $this->contact_subtype;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return ContactData
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return ContactData
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Add staff
     *
     * @param \Entity\Bizj\MarketStaff $staff
     *
     * @return ContactData
     */
    public function addStaff(\Entity\Bizj\MarketStaff $staff)
    {
        $this->Staff[] = $staff;

        return $this;
    }

    /**
     * Remove staff
     *
     * @param \Entity\Bizj\MarketStaff $staff
     */
    public function removeStaff(\Entity\Bizj\MarketStaff $staff)
    {
        $this->Staff->removeElement($staff);
    }

    /**
     * Get staff
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStaff()
    {
        return $this->Staff;
    }
}

