<?php

//decode by http://www.yunlu99.com/
include_once '../Public/config.php';
$pkdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'1\' order by `term` desc limit 1')) - time();
$xyftdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'2\' order by `term` desc limit 1')) - time();
$cqsscdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'3\' order by `term` desc limit 1')) - time();
$pcdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'4\' order by `term` desc limit 1')) - time();
$jnddjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'5\' order by `term` desc limit 1')) - time();
$jsmtdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'6\' order by `term` desc limit 1')) - time();
$jsscdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'7\' order by `term` desc limit 1')) - time();
$jssscdjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'8\' order by `term` desc limit 1')) - time();
$bjldjs = strtotime(get_query_val('fn_open', 'next_time', '`type` = \'9\' order by `term` desc limit 1')) - time();
select_query('fn_setting', '*', '');
while ($con = db_fetch_array()) {
	$cons[] = $con;
}
foreach ($cons as $con) {
	$roomid = $con['roomid'];
	$pk10open = get_query_val('fn_lottery1', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$xyftopen = get_query_val('fn_lottery2', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$cqsscopen = get_query_val('fn_lottery3', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$xy28open = get_query_val('fn_lottery4', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$jnd28open = get_query_val('fn_lottery5', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$jsmtopen = get_query_val('fn_lottery6', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$jsscopen = get_query_val('fn_lottery7', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$jssscopen = get_query_val('fn_lottery8', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	$bjlopen = get_query_val('fn_lottery9', 'gameopen', array('roomid' => $roomid)) == 'true' ? true : false;
	if ($pk10open) {
		$pk10time = (int) get_query_val('fn_lottery1', 'fengtime', array('roomid' => $roomid));
	}
	if ($xyftopen) {
		$xyfttime = (int) get_query_val('fn_lottery2', 'fengtime', array('roomid' => $roomid));
	}
	if ($cqsscopen) {
		$cqssctime = (int) get_query_val('fn_lottery3', 'fengtime', array('roomid' => $roomid));
	}
	if ($xy28open) {
		$pctime = (int) get_query_val('fn_lottery4', 'fengtime', array('roomid' => $roomid));
	}
	if ($jnd28open) {
		$jndtime = (int) get_query_val('fn_lottery5', 'fengtime', array('roomid' => $roomid));
	}
	if ($jsmtopen) {
		$jsmttime = (int) get_query_val('fn_lottery6', 'fengtime', array('roomid' => $roomid));
	}
	if ($jsscopen) {
		$jssctime = (int) get_query_val('fn_lottery7', 'fengtime', array('roomid' => $roomid));
	}
	if ($jssscopen) {
		$jsssctime = (int) get_query_val('fn_lottery8', 'fengtime', array('roomid' => $roomid));
	}
	if ($bjlopen) {
		$bjltime = (int) get_query_val('fn_lottery9', 'fengtime', array('roomid' => $roomid));
	}
	$msg1 = (int) get_query_val('fn_setting', 'msg1_time', array('roomid' => $roomid));
	$msg1_cont = get_query_val('fn_setting', 'msg1_cont', array('roomid' => $roomid));
	$msg2 = (int) get_query_val('fn_setting', 'msg2_time', array('roomid' => $roomid));
	$msg2_cont = get_query_val('fn_setting', 'msg2_cont', array('roomid' => $roomid));
	$msg3 = (int) get_query_val('fn_setting', 'msg3_time', array('roomid' => $roomid));
	$msg3_cont = get_query_val('fn_setting', 'msg3_cont', array('roomid' => $roomid));
	if ($pk10open) {
		if ($pk10time + 30 == $pkdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'pk10');
		}
		if ($pk10time == $pkdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'1\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'pk10');
		}
		if ($msg1_cont != '' && $pkdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'pk10');
		}
		if ($msg2_cont != '' && $pkdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'pk10');
		}
		if ($msg3_cont != '' && $pkdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'pk10');
		}
	}
	if ($xyftopen) {
		if ($xyfttime + 30 == $xyftdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'xyft');
		}
		if ($xyfttime == $xyftdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'2\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'xyft');
		}
		if ($msg1_cont != '' && $xyftdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'xyft');
		}
		if ($msg2_cont != '' && $xyftdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'xyft');
		}
		if ($msg3_cont != '' && $xyftdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'xyft');
		}
	}
	if ($cqsscopen) {
		if ($cqssctime + 30 == $cqsscdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'cqssc');
		}
		if ($cqssctime == $cqsscdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'3\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'cqssc');
		}
		if ($msg1_cont != '' && $cqsscdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'cqssc');
		}
		if ($msg2_cont != '' && $cqsscdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'cqssc');
		}
		if ($msg3_cont != '' && $cqsscdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'cqssc');
		}
	}
	if ($xy28open) {
		if ($pctime + 30 == $pcdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'xy28');
		}
		if ($pctime == $pcdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'4\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'xy28');
		}
		if ($msg1_cont != '' && $pcdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'xy28');
		}
		if ($msg2_cont != '' && $pcdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'xy28');
		}
		if ($msg3_cont != '' && $pcdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'xy28');
		}
	}
	if ($jnd28open) {
		if ($jndtime + 30 == $jnddjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'jnd28');
		}
		if ($jndtime == $jnddjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'5\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'jnd28');
		}
		if ($msg1_cont != '' && $jnddjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'jnd28');
		}
		if ($msg2_cont != '' && $jnddjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'jnd28');
		}
		if ($msg3_cont != '' && $jnddjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'jnd28');
		}
	}
	if ($jsmtopen) {
		if ($jsmttime + 30 == $jsmtdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'jsmt');
		}
		if ($jsmttime == $jsmtdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'6\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'jsmt');
		}
		if ($msg1_cont != '' && $jsmtdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'jsmt');
		}
		if ($msg2_cont != '' && $jsmtdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'jsmt');
		}
		if ($msg3_cont != '' && $jsmtdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'jsmt');
		}
	}
	if ($jsscopen) {
		if ($jssctime + 30 == $jsscdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'jssc');
		}
		if ($jssctime == $jsscdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'7\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'jssc');
		}
		if ($msg1_cont != '' && $jsscdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'jssc');
		}
		if ($msg2_cont != '' && $jsscdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'jssc');
		}
		if ($msg3_cont != '' && $jsscdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'jssc');
		}
	}
	if ($jssscopen) {
		if ($jsssctime + 30 == $jssscdjs) {
			管理员喊话('------距离封盘还有30秒------<br>请需要下注的用户尽快投注', $roomid, 'jsssc');
		}
		if ($jsssctime == $jssscdjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'8\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'jsssc');
		}
		if ($msg1_cont != '' && $jssscdjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'jsssc');
		}
		if ($msg2_cont != '' && $jssscdjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'jsssc');
		}
		if ($msg3_cont != '' && $jssscdjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'jsssc');
		}
	}
	if ($bjlcopen) {
		if ($bjltime + 10 == $bjldjs) {
			管理员喊话('------距离封盘还有10秒------<br>请需要下注的用户尽快投注', $roomid, 'bjl');
		}
		if ($bjltime == $bjldjs) {
			管理员喊话('------已封盘,截止投注------<br>第' . get_query_val('fn_open', 'next_term', '`type` = \'9\' order by `term` desc limit 1') . '期投注已经结束<br>请耐心等待开奖<br>开奖视频结果出来后即可正常下注', $roomid, 'bjl');
		}
		if ($msg1_cont != '' && $bjldjs == $msg1) {
			管理员喊话($msg1_cont, $roomid, 'bjl');
		}
		if ($msg2_cont != '' && $bjldjs == $msg2) {
			管理员喊话($msg2_cont, $roomid, 'bjl');
		}
		if ($msg3_cont != '' && $bjldjs == $msg3) {
			管理员喊话($msg3_cont, $roomid, 'bjl');
		}
	}
}
echo 'PK-10倒计时:' . $pkdjs . '<br>' . 'XY-FT倒计时:' . $xyftdjs . '|' . $xyfttime . '<br>' . 'CQ-SSC倒计时:' . $cqsscdjs . '<br>' . 'XY-28倒计时:' . $pcdjs . '<br>' . 'JND-28倒计时:' . $jnddjs . '<br>' . 'JS-MT倒计时:' . $jsmtdjs . '<br>' . 'JS-SC倒计时:' . $jsscdjs . '<br>' . 'JS-SSC倒计时:' . $jssscdjs . '<br>' . 'BAIJIALE倒计时:' . $bjldjs . '<br>';
echo '系统当前时间戳为 ';
echo '';
echo time() . ' ' . date('Y-m-d H:i:s');
echo '<script type="text/javascript">';
echo 'function fresh_page()';
echo '{';
echo 'window.location.reload();';
echo '}';
echo 'setTimeout(\'fresh_page()\',5000);';
echo '</script>';
function 管理员喊话($Content, $roomid, $game)
{
	$headimg = get_query_val('fn_setting', 'setting_robotsimg', array('roomid' => $roomid));
	insert_query('fn_chat', array('username' => '机器人', 'headimg' => $headimg, 'content' => $Content, 'addtime' => date('H:i:s'), 'type' => 'S3', 'userid' => 'system', 'game' => $game, 'roomid' => $roomid));
}