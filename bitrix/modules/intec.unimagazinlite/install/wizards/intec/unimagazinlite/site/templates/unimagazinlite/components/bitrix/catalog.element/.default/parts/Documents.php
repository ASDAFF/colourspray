<?
	$files = array();
	
	foreach ($arResult['PROPERTIES']['CML2_DOCUMENTS']['VALUE'] as $file)
	{
		$files[] = CFile::GetByID($file);
	}
?>
<div class="startshop-documents uni_parent_col">
	<?foreach ($files as $file):?>
		<a class="startshop-document uni_col uni-25" href="<?=CFile::GetPath($file->arResult[0]['ID'])?>">
			<div class="image"></div>
			<div class="information">
				<div class="name"><?=$file->arResult[0]['ORIGINAL_NAME']?></div>
				<div class="size"><?=GetMessage('DOCUMENTS_SIZE')?> <?=round($file->arResult[0]['FILE_SIZE']/1024)?> <?=GetMessage('DOCUMENTS_VALUE')?></div>
			</div>
		</a>
	<?endforeach;?>
</div>