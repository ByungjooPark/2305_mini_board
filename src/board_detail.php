<?php
define( "SRC_ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/" );
define( "URL_DB", SRC_ROOT."common/db_common.php" );
define( "URL_HEADER", SRC_ROOT."board_header.php" );
include_once( URL_DB );

// Request Parameter 획득(GET)
$arr_get = $_GET;

// DB에서 게시글 정보 획득
$result_info = select_board_info_no( $arr_get["board_no"] );

?>

<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='css/common.css'>
	<title>Detail</title>
</head>
<body>
	<?php include_once( URL_HEADER ) ?>
	<div class="container">
		<table class='table-striped'>
			<tr>
				<th class="radius-left">게시글 번호</th>
				<td class="radius-right"><?php echo $result_info["board_no"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">작성일</th>
				<td class="radius-right"><?php echo $result_info["board_write_date"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">제목</th>
				<td class="radius-right"><?php echo $result_info["board_title"] ?></td>
			</tr>
			<tr>
				<th class="radius-left">내용</th>
				<td class="radius-right"><?php echo $result_info["board_contents"] ?></td>
			</tr>
		</table>
	</div>

	<div class="button">
		<a href="board_update.php?board_no=<?php echo $result_info["board_no"] ?>" class="button_a">수정</a>
		<a href="board_delete.php?board_no=<?php echo $result_info["board_no"] ?>" class="button_a">삭제</a>
		<a href="board_list.php" class="button_a">List</a>
	</div>
	<?php 
		for($i = 0; $i < 9 ; $i++)
		{
	?>
			<div class="snowflake">★</div>
	<?php
		}
	?>
</body>
</html>