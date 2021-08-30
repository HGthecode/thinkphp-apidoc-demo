<?php
namespace app\demo\controller\v1;

use app\BaseController;


class NotApi extends BaseController
{

  public function index (){
      return show(0,"",$this->request->param());
  }
}