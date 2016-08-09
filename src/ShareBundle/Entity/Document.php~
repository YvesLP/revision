<?php

namespace ShareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 */
class Document
{

    public $monFichier;
    
    protected function getUploadDir()
    {
        return 'uploads';
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }
    public function getWebPath()
    {
        return null === $this->docFichier ? null : $this->getUploadDir().'/'.$this->docFichier;
    }
    public function getAbsolutePath()
    {
        return null === $this->docFichier ? null : $this->getUploadRootDir().'/'.$this->docFichier;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preUpload()
    {
        if (null !== $this->monFichier) {
            // do whatever you want to generate a unique name
            $this->docFichier = uniqid().'.'.$this->monFichier->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function upload()
    {
        if (null === $this->monFichier) {
            return;
        }
        $this->monFichier->move($this->getUploadRootDir(), $this->docFichier);

        unset($this->monFichier);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($monFichier = $this->getAbsolutePath()) {
            unlink($monFichier);
        }
    }

    //
    // GENERATED CODE
    //
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $docTitre;

    /**
     * @var string
     */
    private $docDesc;

    /**
     * @var string
     */
    private $docFichier;

    /**
     * @var \DateTime
     */
    private $docPub;

    /**
     * @var \DateTime
     */
    private $docMaj;

    /**
     * @var \UserBundle\Entity\User
     */
    private $docIdUser;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set docTitre
     *
     * @param string $docTitre
     * @return Document
     */
    public function setDocTitre($docTitre)
    {
        $this->docTitre = $docTitre;

        return $this;
    }

    /**
     * Get docTitre
     *
     * @return string 
     */
    public function getDocTitre()
    {
        return $this->docTitre;
    }

    /**
     * Set docDesc
     *
     * @param string $docDesc
     * @return Document
     */
    public function setDocDesc($docDesc)
    {
        $this->docDesc = $docDesc;

        return $this;
    }

    /**
     * Get docDesc
     *
     * @return string 
     */
    public function getDocDesc()
    {
        return $this->docDesc;
    }

    /**
     * Set docFichier
     *
     * @param string $docFichier
     * @return Document
     */
    public function setDocFichier($docFichier)
    {
        $this->docFichier = $docFichier;

        return $this;
    }

    /**
     * Get docFichier
     *
     * @return string 
     */
    public function getDocFichier()
    {
        return $this->docFichier;
    }

    /**
     * Set docPub
     *
     * @param \DateTime $docPub
     * @return Document
     */
    public function setDocPub($docPub)
    {
        $this->docPub = $docPub;

        return $this;
    }

    /**
     * Get docPub
     *
     * @return \DateTime 
     */
    public function getDocPub()
    {
        return $this->docPub;
    }

    /**
     * Set docMaj
     *
     * @param \DateTime $docMaj
     * @return Document
     */
    public function setDocMaj($docMaj)
    {
        $this->docMaj = $docMaj;

        return $this;
    }

    /**
     * Get docMaj
     *
     * @return \DateTime 
     */
    public function getDocMaj()
    {
        return $this->docMaj;
    }

    /**
     * Set docIdUser
     *
     * @param \UserBundle\Entity\User $docIdUser
     * @return Document
     */
    public function setDocIdUser(\UserBundle\Entity\User $docIdUser = null)
    {
        $this->docIdUser = $docIdUser;

        return $this;
    }

    /**
     * Get docIdUser
     *
     * @return \UserBundle\Entity\User 
     */
    public function getDocIdUser()
    {
        return $this->docIdUser;
    }
}
