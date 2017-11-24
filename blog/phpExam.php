<?php

error_reporting(0); 
/*
一.按照给定菜单(menu)和订单(order)，计算订单价格总和
*/

$menu = '[
			{"type_id":1,"name":"大菜","food":[
											{"food_id":1,"name":"鱼香肉丝","price":"10"},
											{"food_id":2,"name":"红烧肉","price":"11"},
											{"food_id":3,"name":"香辣粉","price":"12"}
											]},
			{"type_id":2,"name":"中菜","food":[
											{"food_id":4,"name":"小炒肉","price":"13"},
											{"food_id":5,"name":"云吞","price":"14"}
											]},
			{"type_id":3,"name":"小菜","food":[
											{"food_id":6,"name":"雪糕","price":"15"},
											{"food_id":7,"name":"黄瓜","price":"16"}
											]}	    
		]';

/*
*/

//num系数量
$order = '[{"food_id":1,"num":2},{"food_id":3,"num":1},{"food_id":6,"num":2},{"food_id":7,"num":1}]';
//$order.[i].food_id 订单食物id
$Pmenu = json_decode($menu);
$Porder =  json_decode($order);
$price = 0;//初始化订单价格总和
for($i = 0;$i < count($Porder);$i++)
{
    for($j = 0;$j < count($Pmenu);$j++)
    {
    for($k = 0;$k < count($Pmenu[$j]->food);$k++)
        {
            if($Porder[$i]->food_id == $Pmenu[$j]->food[$k]->food_id)
                $price = $price + $Porder[$i]->num * $Pmenu[$j]->food[$k]->price;
        }
    }
}
//echo $price;//输出变量价格
/*
二.设计一个类Menu，实现以下功能：
1. 设定菜单，每个实例必须有且只有一个菜单(json字符串，结构如上题)
2. 方法calculate, 输入订单后(json字符串，结构如上题), 输出格价
3. 方法discount, 可设定折扣，输出格价时自动计算折扣
4. 静态方法counter。输出calculate方法被调用的次数
5. 将结果发送到2926269816@qq.com，邮件标题写上姓名，谢谢！
*/
class Menu{
    protected   $menu;
    protected   $order;
    protected   $discount = 1;
    static $count = 0;
    public function __construct($json) {
        $this -> menu = json_decode($json);
    }
    public function calculate($json){
        $this ->order = json_decode($json);
        $price = 0;//初始化订单价格总和
        for($i = 0;$i < count($this -> order);$i++)
        {
            for($j = 0;$j < count($this->menu);$j++)
            {
                for($k = 0;$k < count($this->menu[$j]->food);$k++)
                {
                    if($this->order[$i]->food_id == $this->menu[$j]->food[$k]->food_id)
                        $price = $price + $this->order[$i]->num * $this ->menu[$j]->food[$k]->price;
                }
            }
        }
        self::$count += 1; 
        return $this->discount * $price;
    }
    public function discount($num) {
        $this->discount = $num;
    }
    static function counter() {
        return self::$count;
    }
}
$mn = new Menu($menu);
echo $mn->calculate($order);
