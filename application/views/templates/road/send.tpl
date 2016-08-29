{
	"id": "{$road.road_id}",
	"title": "{$road.title}",
	"type": "{$road.type}",
	"url": "{$road.file}",
	"next_road_id": "1",
	"prev_road_id": "2",
	"items": [
	             {if $item_flg == true}
                    {foreach from=$roaditems item=v name=loop}
                        {if $smarty.foreach.loop.last}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "{$v.file}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            }
        		        {else}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "{$v.file}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            },
        		        {/if}
                    {/foreach}
                 {/if}
	]
}