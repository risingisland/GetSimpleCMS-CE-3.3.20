<?php error_reporting(E_ALL ^ E_NOTICE); ?>

<?php $massiveHiddenSection = GSDATAOTHERPATH . '/massiveHiddenSection/';

	global $GSADMIN;
	global $SITEURL;

	$URL = $SITEURL . $GSADMIN;

	$filejson = 'userhidden.json';
	$finaljson = $massiveHiddenSection . $filejson;

	$datee = @file_get_contents($finaljson);
	$data = json_decode($datee);

	$folder2        = GSDATAOTHERPATH . '/massiveMenuExt/';
	$filename2     = $folder2 . 'menuext.json';
	$datee2 = @file_get_contents($filename2);
	$data2 = json_decode($datee2, true);
; ?>

<style>
	@import url("https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap");
	@import url("https://unicons.iconscout.com/release/v2.1.9/css/unicons.css");

	body {
		padding-top: 38px;
	}

	.m-toper {
		font-family: "Lato", sans-serif;
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 38px;
		background: #111;
		z-index: 999;
	}

	.m-toper ul {
		display: flex;
		flex-direction: row;
		padding: 20px 0;
	}

	.m-toper ul li {
		list-style-type: none !important;
		margin: 0;
		padding: 10px 0 !important;
	}

	.massivepages,
	.massiveedit {
		padding: 0 !important;
		display: flex;
		list-style-type: none;
	}

	.massivepages li a,
	.massiveedit li a {
		color: #fff;
		margin-left: 20px;
		text-decoration: none;
		font-size: 16px;
		transition: all 250ms linear;
	}

	.massivepages li a:hover,
	.massiveedit li a:hover {
		opacity: 0.8;
	}

	.m-toper-container {
		width: 96%;
		margin: 0 auto;
		max-width: 1240px;
		display: flex;
		justify-content: space-between;
		height: 40px;
	}

	@media(max-width:768px) {
		.massivepages {
			display: none
		}

		.massiveedit {
			width: 100%;
			margin: 0 auto;
			justify-content: center;
		}

		.massiveedit li {
			margin-right: 15px;
		}
	}

	.maintenceOn {
		display: none !important;
	}

	.m-toper ul:not(.massiveedit) li {
		position: relative !important;
	}

	.m-toper ul:not(.massiveedit) li::after {
		content: attr(data-hover);
		position: absolute;
		top: 40px;
		left: 0;
		border: solid 1px #ddd;
		padding: 5px;
		display: block;
		width: auto;
		font-size: 12px;
		background: #fff;
		padding: 10px;
		text-align: center;
		display: none;
	}

	.m-toper ul li:hover::after {
		display: block;
	}

	@media(max-width:768px){

		.m-toper span{
			display: none;
		}
	}
</style>

<div class="m-toper">
	<div class="m-toper-container">
		<ul class="massiveedit">
			<li data-hover="<?php echo i18n('EDITPAGE_TITLE'); ?>"> <a href="<?php echo $URL; ?>/edit.php?id=<?php echo get_page_slug(); ?>" ><i class="uil uil-edit"></i><span> <?php echo i18n('EDITPAGE_TITLE'); ?></span></a></li>
			<li data-hover="<?php echo i18n('NEW_PAGE'); ?>" ><a href="<?php echo $URL; ?>/edit.php" ><i class="uil uil-plus-circle"></i><span><?php echo i18n('NEW_PAGE'); ?></span> </a></li>
		</ul>

		<ul class="massivepages">
			<li id="nav_pages" data-hover=" <?php echo i18n('massiveAdmin/TAB_PAGES'); ?> "><a href="<?php echo $URL; ?>/pages.php"><i class="uil uil-desktop"></i> </a></li>
			<li id="nav_upload" data-hover="<?php echo i18n('massiveAdmin/TAB_FILES'); ?>"><a href="<?php echo $URL; ?>/upload.php"><i class="uil uil-file"></i></a></li>
			<li id="nav_theme" data-hover="<?php echo i18n('massiveAdmin/TAB_THEME'); ?>"><a href="<?php echo $URL; ?>/theme.php"><i class="uil uil-paint-tool"></i></a></li>
			<li id="nav_backups" data-hover="<?php echo i18n('massiveAdmin/TAB_BACKUPS'); ?>"><a href="<?php echo $URL; ?>/backups.php"><i class="uil uil-save"></i> </a></li>
			<li id="nav_plugins" data-hover="<?php i18n('massiveAdmin/PLUGINS_NAV'); ?>"><a href="<?php echo $URL; ?>/plugins.php"><i class="uil uil-plug"></i></a></li>

			<?php
				if (file_exists($filename2)) {
					foreach ($data2 as $query) {
						echo '<li  data-hover="' . $query["name"] . '"><a href="' . $query["url"] . '" target="' . $query["linkblank"] . '" ><i class="' . $query["icon"] . '"></i></a></li>';
					};
				};
			?>

			<li data-hover="<?php i18n('massiveAdmin/TAB_SETTINGS'); ?>"> <a href="<?php get_site_url(); ?>admin/settings.php"><i class="uil uil-setting"></i></a>
			<li data-hover="<?php i18n('massiveAdmin/TAB_LOGOUT'); ?>"><a href="<?php get_site_url(); ?>admin/logout.php"><i class="uil uil-power"></i></a>
		</ul>
	</div>
</div>

<script>
	if (document.querySelector("#nav_pages") !== null) {
		if ('<?php echo @$data->hidepages; ?>' == "hide") {
			document.querySelector("#nav_pages").remove()
		};
	};

	if (document.querySelector("#nav_upload") !== null) {
		if ('<?php echo @$data->hidefiles; ?>' == "hide") {
			document.querySelector("#nav_upload").remove()
		};
	};

	if (document.querySelector("#nav_theme") !== null) {
		if ('<?php echo @$data->hidethemes; ?>' == "hide") {
			document.querySelector("#nav_theme").remove()
		};
	};

	if (document.querySelector("#nav_plugins") !== null) {
		if ('<?php echo @$data->hideplugin; ?>' == "hide") {
			document.querySelector("#nav_plugins").remove()
		};
	};

	if (document.querySelector("#nav_backups") !== null) {
		if ('<?php echo @$data->hidebackup; ?>' == "hide") {
			document.querySelector("#nav_backups").remove()
		};
	};

	if (document.querySelector("#nav_i18n_gallery") !== null) {
		if ('<?php echo @$data->hidei18n; ?>' == "hide") {
			document.querySelector("#nav_i18n_gallery").remove()
		};
	};

	if (document.querySelector(".support") !== null) {
		if ('<?php echo @$data->hidesupport; ?>' == "hide") {
			document.querySelector(".support").remove()
		};
	};
</script>