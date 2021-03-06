<?php
/**
 * 内容管理
 * 
 * @author        shuguang <5565907@qq.com>
 * @copyright     Copyright (c) 2007-2013 bagesoft. All rights reserved.
 * @link          http://www.bagecms.com
 * @package       BageCMS.admini.Controller
 * @license       http://www.bagecms.com/license
 * @version       v3.1.0
 */

class CalendarController extends XAdminiBase
{
     /** 
* PHP万年历 
* @author Fly 2012/10/16 
*/ 
    protected $_table;//table表格 
    protected $_currentDate;//当前日期 
    protected $_year; //年 
    protected $_month; //月 
    protected $_days; //给定的月份应有的天数 
    protected $_dayofweek;//给定月份的 1号 是星期几 
/** 
* 构造函数 
*/ 
public function __construct() 
{ 
    $this->_table=""; 
    $this->_year = isset($_GET["y"])?$_GET["y"]:date("Y"); 
    $this->_month = isset($_GET["m"])?$_GET["m"]:date("m"); 
    if ($this->_month>12){//处理出现月份大于12的情况 
        $this->_month=1; 
        $this->_year++; 
    } 
    if ($this->_month<1){//处理出现月份小于1的情况 
        $this->_month=12; 
        $this->_year--; 
    } 
    $this->_currentDate = $this->_year.'年'.$this->_month.'月份';//当前得到的日期信息 
    $this->_days = date("t",mktime(0,0,0,$this->_month,1,$this->_year));//得到给定的月份应有的天数 
    $this->_dayofweek = date("w",mktime(0,0,0,$this->_month,1,$this->_year));//得到给定的月份的 1号 是星期几 
} 
/** 
* 输出日历 
*/ 
public function actionIndex() 
{ 
    $this->_showTitle(); 
    $this->_showDate(); 
    echo $this->_table; 
} 
/** 
* 输出标题和表头信息 
*/ 
protected function _showTitle() 
{ 
    $this->_table ='<link href="/static/admin/css/common.css" type="text/css" rel="stylesheet">';
    $this->_table.="<table width='100%' height='80%' class='content_list'><thead><tr align='left'><td colspan='7'>选择年月：</td></tr><tr align='center' ><th colspan='7'>".$this->_currentDate."</th></tr></thead>"; 
    $this->_table.="<tr class='tb_list'>"; 
    $this->_table .="<td style='color:red'>星期日</td>"; 
    $this->_table .="<td>星期一</td>"; 
    $this->_table .="<td>星期二</td>"; 
    $this->_table .="<td>星期三</td>"; 
    $this->_table .="<td>星期四</td>"; 
    $this->_table .="<td>星期五</td>"; 
    $this->_table .="<td style='color:red'>星期六</td>"; 
    $this->_table.="</tr>"; 
} 
/** 
* 输出日期信息 
* 根据当前日期输出日期信息 
*/ 
protected function _showDate() 
{ 
     $this->_table.="<tr class='tb_list' style='height:100px'>";
    $nums = $this->_dayofweek+1; 
    for ($i=1;$i<=$this->_dayofweek;$i++){//输出1号之前的空白日期 
        $this->_table.="<td>&nbsp;</td>"; 
    } 
    for ($i=1;$i<=$this->_days;$i++){//输出天数信息 
        if ($nums%7==0){//换行处理：7个一行 
            $this->_table.="<td>$i</td></tr><tr style='height:100px'>"; 
        }else{ 
            $this->_table.="<td>$i</td>"; 
        } 
            $nums++; 
        } 
    $this->_table.="</table>"; 
    $this->_table.="<br/><br/><h3><a href='".$this->createUrl('admini/calendar/index',array('y'=>$this->_year,'m'=>$this->_month-1))."'>上一月</a>   "; 
    $this->_table.="&nbsp;&nbsp;&nbsp;&nbsp;<a href='".$this->createUrl('admini/calendar/index',array('y'=>$this->_year,'m'=>$this->_month+1))."'>下一月</a></h3><br/><br/>"; 
    } 
 
}
