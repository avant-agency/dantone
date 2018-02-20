<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die(); ?>
<? if (!$_POST["endcursor"]): ?>
<div class="instagram">
	<h1 style="font-size:22px;"><?=GetMessage("TMBIT_INSTAGRAMPOSTS_MY_V")?></h1>
	<ul class="instagram-list" data-endcursor="<?=$arResult["POSTS"]->user->media->page_info->end_cursor?>">
<? endif; ?>
	<? if (isset($arResult["POSTS"])): ?>
		<? foreach ($arResult["POSTS"]->user->media->nodes as $key => $post): ?>
			<li>
				<a href="https://www.instagram.com/p/<?=$post->code?>" target="_blank">
					<img src="<?=$post->thumbnail_src?>">
					<div class="instagram-info">
						<div class="instagram-icon instagram-icon--likes">
							<span><? echo number_format($post->likes->count, 0, '.', ' '); ?> <?=GetMessage("TMBIT_INSTAGRAMPOSTS_")?></span>
						</div>
						<div class="instagram-icon instagram-icon--comments">
							<span><? echo number_format($post->comments->count, 0, '.', ' '); ?> <?=GetMessage("TMBIT_INSTAGRAMPOSTS_")?></span>
						</div>
					</div>
				</a>
			</li>
		<? endforeach; ?>
	<? else: ?>
		<p><?=GetMessage("TMBIT_INSTAGRAMPOSTS_ZAPISI_NE_NAYDENY")?></p>
	<? endif; ?>
<? if (!$_POST["endcursor"]): ?>
	</ul>
	<a class="instagram-more"><?=GetMessage("TMBIT_INSTAGRAMPOSTS_POKAZATQ_ESE")?></a>
</div>
<? endif; ?>

<script src="loadingoverlay.js"></script>
