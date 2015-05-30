<?php
namespace App\Model;
use App\Model;

/**
 * @Entity @Table(name="students")
 * @HasLifecycleCallbacks
 */
class Student extends Model {
    const FEMALE = 0;
    const MALE = 1;
    const VISITOR =0;
    const LOCAL = 1;

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /** @Column(length=50) */
    protected $name;
    /** @Column(length=50) */
    protected $surname;
    /** @Column(length=5) */
    protected $branch;
    /** @Column(type="boolean") */
    protected $gender = SELF::MALE;
    /** @Column(type="string") */
    protected $email;
    /** @Column(type="smallint") */
    protected $rating;
    /** @Column(type="integer") */
    protected $birthyear;
    /** @Column(type="boolean") */
    protected $place = SELF::LOCAL;

    /**
     * @PrePersist @PreUpdate
     */
    public function validate()
    {
        if (strlen($this->branch) > 5) {
            //throw error
        }
        if ($this->rating > 300) {
            //throw error
        }
    }

    public function getGender() {
        $result = "";
        switch ($this->gender) {
            case 0: $result = "female"; break;
            case 1: $result = "male"; break;
        }
        return $result;
    }

    public function getPlace() {
        $result = "";
        switch ($this->place) {
            case 0: $result = "visitor"; break;
            case 1: $result = "local"; break;
        }
        return $result;
    }
}

