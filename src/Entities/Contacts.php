<?php

namespace Condividendo\FatturaPA\Entities;

use Condividendo\FatturaPA\Contracts\Tag;
use Condividendo\FatturaPA\Tags\Contacts as ContactsTag;
use Condividendo\FatturaPA\Traits\Makeable;

class Contacts extends AbstractEntity
{
    use Makeable;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $phone;


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;
        return $this;
    }

    public function setFax(string $fax): self
    {
        $this->fax = $fax;
        return $this;
    }

    /**
     * @return ContactsTag
     */
    public function getTag()
    {
        $tag = ContactsTag::make();
        if($this->email){
            $tag->setEmail($this->email);
        }
        if($this->phone){
            $tag->setPhone($this->phone);
        }
        if($this->email){
            $tag->setFax($this->fax);
        }
        return $tag;
    }

}
