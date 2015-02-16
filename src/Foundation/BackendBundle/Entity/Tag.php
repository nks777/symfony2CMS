<?php

namespace Foundation\BackendBundle\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;
//use 
/**
 * @Entity
 * @UniqueEntity(fields="value", message="This tag alreadyh has been created")
 * @author nks
 */
class Tag {
    
    const ENTITY_NAME = "FoundationBackendBundle:Tag";
    
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @Column(type="string")
     * @NotBlank()
     * @Length(min=1, max=60)
     */
    private $value;
    
    function getId() {
        return $this->id;
    }

    function getValue() {
        return $this->value;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setValue($value) {
        $this->value = $value;
    }
    
}


/*
 
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('aaa');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('bbb');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ccc');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('fff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('qqq');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('www');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('rrr');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ttt');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('yyy');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('uuu');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('iii');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ooo');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ppp');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('sss');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('fff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('jjj');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('kkk');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('lll');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('zzz');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('xxx');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('vvv');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('nnn');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('mmm');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('aaaaaaaaaaaa');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('bbbbbbbbbbbb');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('cccccccccccc');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('qqqqqqqqqqqq');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('wwwwwwwwwwww');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('rrrrrrrrrrrr');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('tttttttttttt');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('yyyyyyyyyyyy');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('uuuuuuuuuuuu');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('iiiiiiiiiiii');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('oooooooooooo');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('pppppppppppp');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ssssssssssss');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('jjjjjjjjjjjj');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('kkkkkkkkkkkk');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('llllllllllll');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('zzzzzzzzzzzz');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('xxxxxxxxxxxx');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('vvvvvvvvvvvv');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('nnnnnnnnnnnn');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('mmmmmmmmmmmm');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('aaaaaa');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('bbbbbb');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('cccccc');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('qqqqqq');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('wwwwww');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('rrrrrr');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('tttttt');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('yyyyyy');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('uuuuuu');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('iiiiii');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('oooooo');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('pppppp');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ssssss');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('jjjjjj');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('kkkkkk');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('llllll');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('zzzzzz');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('xxxxxx');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('vvvvvv');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('nnnnnn');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('mmmmmm');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('aaaaaaaaaaaa');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('bbbbbbbbbbbb');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('cccccccccccc');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('qqqqqqqqqqqq');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('wwwwwwwwwwww');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('rrrrrrrrrrrr');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('tttttttttttt');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('yyyyyyyyyyyy');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('uuuuuuuuuuuu');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('iiiiiiiiiiii');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('oooooooooooo');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('pppppppppppp');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ssssssssssss');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('jjjjjjjjjjjj');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('aaaaaaaaaaaaaaaaaaaaaaaa');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('bbbbbbbbbbbbbbbbbbbbbbbb');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('cccccccccccccccccccccccc');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddddddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeeeeeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffffffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggggggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhhhhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('qqqqqqqqqqqqqqqqqqqqqqqq');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('wwwwwwwwwwwwwwwwwwwwwwww');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('eeeeeeeeeeeeeeeeeeeeeeee');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('rrrrrrrrrrrrrrrrrrrrrrrr');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('tttttttttttttttttttttttt');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('yyyyyyyyyyyyyyyyyyyyyyyy');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('uuuuuuuuuuuuuuuuuuuuuuuu');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('iiiiiiiiiiiiiiiiiiiiiiii');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('oooooooooooooooooooooooo');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('pppppppppppppppppppppppp');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ssssssssssssssssssssssss');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('dddddddddddddddddddddddd');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('ffffffffffffffffffffffff');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('gggggggggggggggggggggggg');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('jjjjjjjjjjjjjjjjjjjjjjjj');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('hhhhhhhhhhhhhhhhhhhhhhhh');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('kkkkkkkkkkkkkkkkkkkkkkkk');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('llllllllllllllllllllllll');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('zzzzzzzzzzzzzzzzzzzzzzzz');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('xxxxxxxxxxxxxxxxxxxxxxxx');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('vvvvvvvvvvvvvvvvvvvvvvvv');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('nnnnnnnnnnnnnnnnnnnnnnnn');
INSERT INTO `symfony`.`Tag` (`value`) VALUES ('mmmmmmmmmmmmmmmmmmmmmmmm');
 
 
 */