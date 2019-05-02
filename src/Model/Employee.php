<?php
namespace App\Model;

class Employee
{
    /**
     * @var string
     */
    private $uuid;

    /**
     * @var string
     */
    private $company;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany(string $company)
    {
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getBio(): string
    {
        return $this->bio;
    }

    /**
     * @param string $bio
     */
    public function setBio(string $bio)
    {
        $this->bio = $this->stripHtmlAndScripts($bio);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar)
    {
        $this->avatar = $this->validateUrl($avatar);
    }

    /**
     * @param string $attribute
     * @return string
     */
    private function stripHtmlAndScripts(string $attribute): string
    {
        $attribute = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $attribute);
        return strip_tags($attribute);
    }

    /**
     * @param string $attribute
     * @return string
     */
    private function validateUrl(string $attribute): string
    {
        if (filter_var($attribute, FILTER_VALIDATE_URL)) { 
            return $attribute;
        }
        return '';
    }
}
