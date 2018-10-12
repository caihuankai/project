<?php
/**
 * Autogenerated by Thrift Compiler (0.9.3)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


/**
 * The first thing to know about are types. The available types in Thrift are:
 * 
 *  bool        Boolean, one byte
 *  byte        Signed byte
 *  i16         Signed 16-bit integer
 *  i32         Signed 32-bit integer
 *  i64         Signed 64-bit integer
 *  double      64-bit floating point value
 *  string      String
 *  binary      Blob (byte array)
 *  map<t1,t2>  Map from one type to another
 *  list<t1>    Ordered list of one type
 *  set<t1>     Set of unique elements of one type
 * 
 * Did you also notice that Thrift supports C style comments?
 */
class TChatMsg {
  static $_TSPEC;

  /**
   * @var int
   */
  public $srcUId = null;
  /**
   * @var int
   */
  public $dstUId = null;
  /**
   * @var int
   */
  public $msgType = null;
  /**
   * @var string
   */
  public $content = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'srcUId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'dstUId',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'msgType',
          'type' => TType::BYTE,
          ),
        4 => array(
          'var' => 'content',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['srcUId'])) {
        $this->srcUId = $vals['srcUId'];
      }
      if (isset($vals['dstUId'])) {
        $this->dstUId = $vals['dstUId'];
      }
      if (isset($vals['msgType'])) {
        $this->msgType = $vals['msgType'];
      }
      if (isset($vals['content'])) {
        $this->content = $vals['content'];
      }
    }
  }

  public function getName() {
    return 'TChatMsg';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->srcUId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->dstUId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->msgType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TChatMsg');
    if ($this->srcUId !== null) {
      $xfer += $output->writeFieldBegin('srcUId', TType::I32, 1);
      $xfer += $output->writeI32($this->srcUId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dstUId !== null) {
      $xfer += $output->writeFieldBegin('dstUId', TType::I32, 2);
      $xfer += $output->writeI32($this->dstUId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msgType !== null) {
      $xfer += $output->writeFieldBegin('msgType', TType::BYTE, 3);
      $xfer += $output->writeByte($this->msgType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->content !== null) {
      $xfer += $output->writeFieldBegin('content', TType::STRING, 4);
      $xfer += $output->writeString($this->content);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TChatAuditMsg {
  static $_TSPEC;

  /**
   * @var int
   */
  public $srcUId = null;
  /**
   * @var int
   */
  public $dstUId = null;
  /**
   * @var int
   */
  public $msgType = null;
  /**
   * @var string
   */
  public $content = null;
  /**
   * @var int
   */
  public $groupId = null;
  /**
   * @var int
   */
  public $msgId = null;
  /**
   * @var int
   */
  public $mastermsgId = null;
  /**
   * @var int
   */
  public $notifyType = null;
  /**
   * @var int
   */
  public $updateId = null;
  /**
   * @var int
   */
  public $roomType = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'srcUId',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'dstUId',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'msgType',
          'type' => TType::BYTE,
          ),
        4 => array(
          'var' => 'content',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'groupId',
          'type' => TType::I32,
          ),
        6 => array(
          'var' => 'msgId',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'mastermsgId',
          'type' => TType::I32,
          ),
        8 => array(
          'var' => 'notifyType',
          'type' => TType::I32,
          ),
        9 => array(
          'var' => 'updateId',
          'type' => TType::I32,
          ),
        10 => array(
          'var' => 'roomType',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['srcUId'])) {
        $this->srcUId = $vals['srcUId'];
      }
      if (isset($vals['dstUId'])) {
        $this->dstUId = $vals['dstUId'];
      }
      if (isset($vals['msgType'])) {
        $this->msgType = $vals['msgType'];
      }
      if (isset($vals['content'])) {
        $this->content = $vals['content'];
      }
      if (isset($vals['groupId'])) {
        $this->groupId = $vals['groupId'];
      }
      if (isset($vals['msgId'])) {
        $this->msgId = $vals['msgId'];
      }
      if (isset($vals['mastermsgId'])) {
        $this->mastermsgId = $vals['mastermsgId'];
      }
      if (isset($vals['notifyType'])) {
        $this->notifyType = $vals['notifyType'];
      }
      if (isset($vals['updateId'])) {
        $this->updateId = $vals['updateId'];
      }
      if (isset($vals['roomType'])) {
        $this->roomType = $vals['roomType'];
      }
    }
  }

  public function getName() {
    return 'TChatAuditMsg';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->srcUId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->dstUId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::BYTE) {
            $xfer += $input->readByte($this->msgType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->groupId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->msgId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->mastermsgId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->notifyType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->updateId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 10:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->roomType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TChatAuditMsg');
    if ($this->srcUId !== null) {
      $xfer += $output->writeFieldBegin('srcUId', TType::I32, 1);
      $xfer += $output->writeI32($this->srcUId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->dstUId !== null) {
      $xfer += $output->writeFieldBegin('dstUId', TType::I32, 2);
      $xfer += $output->writeI32($this->dstUId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msgType !== null) {
      $xfer += $output->writeFieldBegin('msgType', TType::BYTE, 3);
      $xfer += $output->writeByte($this->msgType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->content !== null) {
      $xfer += $output->writeFieldBegin('content', TType::STRING, 4);
      $xfer += $output->writeString($this->content);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupId !== null) {
      $xfer += $output->writeFieldBegin('groupId', TType::I32, 5);
      $xfer += $output->writeI32($this->groupId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msgId !== null) {
      $xfer += $output->writeFieldBegin('msgId', TType::I32, 6);
      $xfer += $output->writeI32($this->msgId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->mastermsgId !== null) {
      $xfer += $output->writeFieldBegin('mastermsgId', TType::I32, 7);
      $xfer += $output->writeI32($this->mastermsgId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->notifyType !== null) {
      $xfer += $output->writeFieldBegin('notifyType', TType::I32, 8);
      $xfer += $output->writeI32($this->notifyType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->updateId !== null) {
      $xfer += $output->writeFieldBegin('updateId', TType::I32, 9);
      $xfer += $output->writeI32($this->updateId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->roomType !== null) {
      $xfer += $output->writeFieldBegin('roomType', TType::I32, 10);
      $xfer += $output->writeI32($this->roomType);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TChatMsgExtra {
  static $_TSPEC;

  /**
   * @var bool
   */
  public $isPrivate = false;
  /**
   * @var bool
   */
  public $pushOnline = false;
  /**
   * @var bool
   */
  public $memberOnly = false;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'isPrivate',
          'type' => TType::BOOL,
          ),
        2 => array(
          'var' => 'pushOnline',
          'type' => TType::BOOL,
          ),
        3 => array(
          'var' => 'memberOnly',
          'type' => TType::BOOL,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['isPrivate'])) {
        $this->isPrivate = $vals['isPrivate'];
      }
      if (isset($vals['pushOnline'])) {
        $this->pushOnline = $vals['pushOnline'];
      }
      if (isset($vals['memberOnly'])) {
        $this->memberOnly = $vals['memberOnly'];
      }
    }
  }

  public function getName() {
    return 'TChatMsgExtra';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->isPrivate);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->pushOnline);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->memberOnly);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TChatMsgExtra');
    if ($this->isPrivate !== null) {
      $xfer += $output->writeFieldBegin('isPrivate', TType::BOOL, 1);
      $xfer += $output->writeBool($this->isPrivate);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->pushOnline !== null) {
      $xfer += $output->writeFieldBegin('pushOnline', TType::BOOL, 2);
      $xfer += $output->writeBool($this->pushOnline);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->memberOnly !== null) {
      $xfer += $output->writeFieldBegin('memberOnly', TType::BOOL, 3);
      $xfer += $output->writeBool($this->memberOnly);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TGroupAssistMsg {
  static $_TSPEC;

  /**
   * @var int
   */
  public $userID = null;
  /**
   * @var int
   */
  public $groupID = null;
  /**
   * @var int
   */
  public $svrType = null;
  /**
   * @var bool
   */
  public $svrSwitch = null;
  /**
   * @var bool
   */
  public $svrLevelUp = null;
  /**
   * @var int
   */
  public $svrLevel = null;
  /**
   * @var int
   */
  public $state = null;
  /**
   * @var string
   */
  public $url = null;
  /**
   * @var int
   */
  public $msgType = null;
  /**
   * @var string
   */
  public $msg = null;
  /**
   * @var int
   */
  public $authID = null;
  /**
   * @var int
   */
  public $investuserID = null;
  /**
   * @var int
   */
  public $packetID = null;
  /**
   * @var int
   */
  public $balance = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'userID',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'groupID',
          'type' => TType::I32,
          ),
        3 => array(
          'var' => 'svrType',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'svrSwitch',
          'type' => TType::BOOL,
          ),
        5 => array(
          'var' => 'svrLevelUp',
          'type' => TType::BOOL,
          ),
        6 => array(
          'var' => 'svrLevel',
          'type' => TType::I32,
          ),
        7 => array(
          'var' => 'state',
          'type' => TType::I32,
          ),
        8 => array(
          'var' => 'url',
          'type' => TType::STRING,
          ),
        9 => array(
          'var' => 'msgType',
          'type' => TType::I32,
          ),
        10 => array(
          'var' => 'msg',
          'type' => TType::STRING,
          ),
        11 => array(
          'var' => 'authID',
          'type' => TType::I32,
          ),
        12 => array(
          'var' => 'investuserID',
          'type' => TType::I32,
          ),
        13 => array(
          'var' => 'packetID',
          'type' => TType::I32,
          ),
        14 => array(
          'var' => 'balance',
          'type' => TType::I32,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['userID'])) {
        $this->userID = $vals['userID'];
      }
      if (isset($vals['groupID'])) {
        $this->groupID = $vals['groupID'];
      }
      if (isset($vals['svrType'])) {
        $this->svrType = $vals['svrType'];
      }
      if (isset($vals['svrSwitch'])) {
        $this->svrSwitch = $vals['svrSwitch'];
      }
      if (isset($vals['svrLevelUp'])) {
        $this->svrLevelUp = $vals['svrLevelUp'];
      }
      if (isset($vals['svrLevel'])) {
        $this->svrLevel = $vals['svrLevel'];
      }
      if (isset($vals['state'])) {
        $this->state = $vals['state'];
      }
      if (isset($vals['url'])) {
        $this->url = $vals['url'];
      }
      if (isset($vals['msgType'])) {
        $this->msgType = $vals['msgType'];
      }
      if (isset($vals['msg'])) {
        $this->msg = $vals['msg'];
      }
      if (isset($vals['authID'])) {
        $this->authID = $vals['authID'];
      }
      if (isset($vals['investuserID'])) {
        $this->investuserID = $vals['investuserID'];
      }
      if (isset($vals['packetID'])) {
        $this->packetID = $vals['packetID'];
      }
      if (isset($vals['balance'])) {
        $this->balance = $vals['balance'];
      }
    }
  }

  public function getName() {
    return 'TGroupAssistMsg';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->userID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->groupID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->svrType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->svrSwitch);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::BOOL) {
            $xfer += $input->readBool($this->svrLevelUp);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->svrLevel);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 7:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->state);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 8:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->url);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 9:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->msgType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 10:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->msg);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 11:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->authID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 12:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->investuserID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 13:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->packetID);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 14:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->balance);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TGroupAssistMsg');
    if ($this->userID !== null) {
      $xfer += $output->writeFieldBegin('userID', TType::I32, 1);
      $xfer += $output->writeI32($this->userID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupID !== null) {
      $xfer += $output->writeFieldBegin('groupID', TType::I32, 2);
      $xfer += $output->writeI32($this->groupID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->svrType !== null) {
      $xfer += $output->writeFieldBegin('svrType', TType::I32, 3);
      $xfer += $output->writeI32($this->svrType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->svrSwitch !== null) {
      $xfer += $output->writeFieldBegin('svrSwitch', TType::BOOL, 4);
      $xfer += $output->writeBool($this->svrSwitch);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->svrLevelUp !== null) {
      $xfer += $output->writeFieldBegin('svrLevelUp', TType::BOOL, 5);
      $xfer += $output->writeBool($this->svrLevelUp);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->svrLevel !== null) {
      $xfer += $output->writeFieldBegin('svrLevel', TType::I32, 6);
      $xfer += $output->writeI32($this->svrLevel);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->state !== null) {
      $xfer += $output->writeFieldBegin('state', TType::I32, 7);
      $xfer += $output->writeI32($this->state);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->url !== null) {
      $xfer += $output->writeFieldBegin('url', TType::STRING, 8);
      $xfer += $output->writeString($this->url);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msgType !== null) {
      $xfer += $output->writeFieldBegin('msgType', TType::I32, 9);
      $xfer += $output->writeI32($this->msgType);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->msg !== null) {
      $xfer += $output->writeFieldBegin('msg', TType::STRING, 10);
      $xfer += $output->writeString($this->msg);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->authID !== null) {
      $xfer += $output->writeFieldBegin('authID', TType::I32, 11);
      $xfer += $output->writeI32($this->authID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->investuserID !== null) {
      $xfer += $output->writeFieldBegin('investuserID', TType::I32, 12);
      $xfer += $output->writeI32($this->investuserID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->packetID !== null) {
      $xfer += $output->writeFieldBegin('packetID', TType::I32, 13);
      $xfer += $output->writeI32($this->packetID);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->balance !== null) {
      $xfer += $output->writeFieldBegin('balance', TType::I32, 14);
      $xfer += $output->writeI32($this->balance);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class TPPTPicInfo {
  static $_TSPEC;

  /**
   * @var int
   */
  public $rank = null;
  /**
   * @var string
   */
  public $picId = null;
  /**
   * @var int
   */
  public $groupId = null;
  /**
   * @var string
   */
  public $picUrl = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'rank',
          'type' => TType::I32,
          ),
        2 => array(
          'var' => 'picId',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'groupId',
          'type' => TType::I32,
          ),
        4 => array(
          'var' => 'picUrl',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['rank'])) {
        $this->rank = $vals['rank'];
      }
      if (isset($vals['picId'])) {
        $this->picId = $vals['picId'];
      }
      if (isset($vals['groupId'])) {
        $this->groupId = $vals['groupId'];
      }
      if (isset($vals['picUrl'])) {
        $this->picUrl = $vals['picUrl'];
      }
    }
  }

  public function getName() {
    return 'TPPTPicInfo';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->rank);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->picId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::I32) {
            $xfer += $input->readI32($this->groupId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->picUrl);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('TPPTPicInfo');
    if ($this->rank !== null) {
      $xfer += $output->writeFieldBegin('rank', TType::I32, 1);
      $xfer += $output->writeI32($this->rank);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->picId !== null) {
      $xfer += $output->writeFieldBegin('picId', TType::STRING, 2);
      $xfer += $output->writeString($this->picId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->groupId !== null) {
      $xfer += $output->writeFieldBegin('groupId', TType::I32, 3);
      $xfer += $output->writeI32($this->groupId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->picUrl !== null) {
      $xfer += $output->writeFieldBegin('picUrl', TType::STRING, 4);
      $xfer += $output->writeString($this->picUrl);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


