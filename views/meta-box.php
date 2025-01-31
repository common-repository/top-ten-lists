<style type="text/css">
	#top-ten-lists-plugin div.mce-tinymce {border: 1px solid rgba(0,0,0,0.2);}
</style>

<div data-ng-app="topTenListsAngularApp" data-ng-controller="main">
	<div style="border:1px dashed #ddd;margin-bottom:10px;padding:10px;overflow:hidden;" class="top-ten-list-item" data-ng-repeat="item in listItems">
		<div style="clear:both;margin-bottom:10px;overflow:hidden;">
			<div data-ng-bind="($index + 1) + '.'" style="float:left;margin-right:10px;font-size:1.8em;line-height:1.4em;"></div>
			<div style="float:left;width:87%;">
				<input type="text" placeholder="Title" name="top_ten_list[{{$index}}][title]" data-ng-model="item.title" style="width:100%;font-size:1.3em;height:2em;" />
			</div>
		</div>
		<p data-ng-show="!item.image_url">
			<a class="button" style="padding-left:5px;" data-ng-click="addImage($index)">
				<span class="dashicons dashicons-format-image" style="margin:3px 2px;"></span>
				<?php _e('Add Media'); ?>
			</a>
			<input type="hidden" name="top_ten_list[{{$index}}][image]" data-ng-model="item.image">
		</p>
		<p data-ng-show="item.image_url">
			<img data-ng-src="{{item.image_url}}" data-ng-click="addImage($index)" style="max-height:200px;max-width:100%;cursor:pointer;" title="Edit Image" />
		</p>
		<input type="hidden" name="top_ten_list[{{$index}}][image_url]" data-ng-value="item.image_url" />
		<input type="hidden" name="top_ten_list[{{$index}}][image_id]" data-ng-value="item.image_id" />
		<ttl-textarea index="$index" item="item" items="listItems">{{item.content}}</ttl-textarea>
		<div style="clear:both;margin-top:10px;">
			<div style="float:left;">
				<a href="javascript:;" style="text-decoration:none;" title="Move up to #{{$index}}" data-ng-show="$index > 0" data-ng-click="moveItemUp($index)"><span class="dashicons dashicons-arrow-up-alt"></span></a>
				<a href="javascript:;" style="text-decoration:none;" title="Move down to #{{$index + 2}}" data-ng-show="$index + 1 < listItems.length" data-ng-click="moveItemDown($index)"><span class="dashicons dashicons-arrow-down-alt"></span></a>
			</div>
			<div style="float:right;text-align:right;">
				<a href="javascript:;" style="color:#a00;" data-ng-click="removeItem($index)" title="Remove #{{$index + 1}}">Remove Item</a>
			</div>
		</div>
	</div>
	<input type="hidden" name="top_ten_list" value="" data-ng-if="!listItems.length" />
	<p data-ng-show="!listItems.length">Click the button below to start your list!</p>
	<p><a class="button" data-ng-click="newListItem()"><?php _e('New List Item'); ?></a></p>
</div>

<script>
	var topTenListsGlobal = {};
	topTenListsGlobal.items = <?php echo json_encode($list_items); ?>;
</script>
