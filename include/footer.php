<div id="footerSection">
	<div class="container">
		<div class="row">
			<div class="span3">
				<h5>Tài khoản</h5>
				<a href="login.php">Tài khoản của bạn</a>
				<a href="login.php">Thông tin</a>
				<a href="login.php">Lịch sử mua hàng</a>
			</div>
			<div class="span3">
				<h5>Thông tin</h5>
				<a href="contact.php">Liên hệ</a>
				<a href="register.php">Đăng ký</a>
			</div>
			<div class="span3">
				<h5>Cửa hàng</h5>
				<a href="#">Sản phẩm mới</a>
				<a href="#">Top bán chạy</a>
				<a href="special_offer.php">Sản phẩm đặc biệt</a>
			</div>
			<div id="socialMedia" class="span3 pull-right">
				<h5>Mạng xã hội </h5>
				<a href="#"><img width="60" height="60" src="themes/images/facebook.png" title="facebook" alt="facebook" /></a>
				<a href="#"><img width="60" height="60" src="themes/images/twitter.png" title="twitter" alt="twitter" /></a>
				<a href="#"><img width="60" height="60" src="themes/images/youtube.png" title="youtube" alt="youtube" /></a>
			</div>
		</div>
	</div><!-- Container End -->
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
<script src="themes/js/jquery.js" type="text/javascript"></script>
<script src="themes/js/bootstrap.min.js" type="text/javascript"></script>
<script src="themes/js/google-code-prettify/prettify.js"></script>

<script src="themes/js/bootshop.js"></script>
<script src="themes/js/jquery.lightbox-0.5.js"></script>
<script>
	/* ..............................................
        Xem thêm và bớt comment
        ................................................. */
	//Số comment mặc định ban đầu
	var x = 3;
	const actionCount = x;
	console.log()
	const eleHide = `.be-comment:nth-child(n + ${actionCount + 1})`
	$(eleHide).hide()

	if ($(".be-comment-block li").length <= actionCount) {
		$('#loadMore').hide();
	}
	$('#showLess').hide();


	//hàm xem thêm comment
	function LoadMoreComment() {
		size_li = $(".be-comment-block li").length;
		x = (x + actionCount <= size_li) ? x + actionCount : size_li;
		$('.be-comment-block li:lt(' + x + ')').show();
		$('#myList li:lt(' + x + ')').css("display", "flex")
		$('#showLess').show();
		if (x >= size_li) {
			$('#loadMore').hide();
		}
	};

	//hàm ẩn bớt comment
	function ShowLessComment() {
		size_li = $(".be-comment-block li").length;
		x = (x - actionCount <= actionCount) ? actionCount : x - actionCount;
		$('.be-comment-block li').not(':lt(' + x + ')').hide();
		$('#loadMore').show();
		$('#showLess').show();
		if (x <= actionCount) {
			$('#showLess').hide();
		}
	};
	// //Thêm sự kiện onclick 2 nút
	$('#loadMore').click(LoadMoreComment)
	$('#showLess').click(ShowLessComment)
</script>


<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
	<link rel="stylesheet" href="themes/switch/themeswitch.css" type="text/css" media="screen" />
	<script src="themes/switch/theamswitcher.js" type="text/javascript" charset="utf-8"></script>
	<div id="themeContainer">
		<div id="hideme" class="themeTitle">Style Selector</div>
		<div class="themeName">Oregional Skin</div>
		<div class="images style">
			<a href="themes/css/#" name="bootshop"><img src="themes/switch/images/clr/bootshop.png" alt="bootstrap business templates" class="active"></a>
			<a href="themes/css/#" name="businessltd"><img src="themes/switch/images/clr/businessltd.png" alt="bootstrap business templates" class="active"></a>
		</div>
		<div class="themeName">Bootswatch Skins (11)</div>
		<div class="images style">
			<a href="themes/css/#" name="amelia" title="Amelia"><img src="themes/switch/images/clr/amelia.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="spruce" title="Spruce"><img src="themes/switch/images/clr/spruce.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="superhero" title="Superhero"><img src="themes/switch/images/clr/superhero.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="cyborg"><img src="themes/switch/images/clr/cyborg.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="cerulean"><img src="themes/switch/images/clr/cerulean.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="journal"><img src="themes/switch/images/clr/journal.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="readable"><img src="themes/switch/images/clr/readable.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="simplex"><img src="themes/switch/images/clr/simplex.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="slate"><img src="themes/switch/images/clr/slate.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="spacelab"><img src="themes/switch/images/clr/spacelab.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="united"><img src="themes/switch/images/clr/united.png" alt="bootstrap business templates"></a>
			<p style="margin:0;line-height:normal;margin-left:-10px;display:none;"><small>These are just examples
					and you can build your own color scheme in the backend.</small></p>
		</div>
		<div class="themeName">Background Patterns </div>
		<div class="images patterns">
			<a href="themes/css/#" name="pattern1"><img src="themes/switch/images/pattern/pattern1.png" alt="bootstrap business templates" class="active"></a>
			<a href="themes/css/#" name="pattern2"><img src="themes/switch/images/pattern/pattern2.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern3"><img src="themes/switch/images/pattern/pattern3.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern4"><img src="themes/switch/images/pattern/pattern4.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern5"><img src="themes/switch/images/pattern/pattern5.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern6"><img src="themes/switch/images/pattern/pattern6.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern7"><img src="themes/switch/images/pattern/pattern7.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern8"><img src="themes/switch/images/pattern/pattern8.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern9"><img src="themes/switch/images/pattern/pattern9.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern10"><img src="themes/switch/images/pattern/pattern10.png" alt="bootstrap business templates"></a>

			<a href="themes/css/#" name="pattern11"><img src="themes/switch/images/pattern/pattern11.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern12"><img src="themes/switch/images/pattern/pattern12.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern13"><img src="themes/switch/images/pattern/pattern13.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern14"><img src="themes/switch/images/pattern/pattern14.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern15"><img src="themes/switch/images/pattern/pattern15.png" alt="bootstrap business templates"></a>

			<a href="themes/css/#" name="pattern16"><img src="themes/switch/images/pattern/pattern16.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern17"><img src="themes/switch/images/pattern/pattern17.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern18"><img src="themes/switch/images/pattern/pattern18.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern19"><img src="themes/switch/images/pattern/pattern19.png" alt="bootstrap business templates"></a>
			<a href="themes/css/#" name="pattern20"><img src="themes/switch/images/pattern/pattern20.png" alt="bootstrap business templates"></a>

		</div>
	</div>
</div>
<span id="themesBtn"></span>
</body>

</html>