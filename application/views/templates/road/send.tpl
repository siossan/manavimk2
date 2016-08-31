{
	"id": "{$road.road_id}",
	"title": "{$road.title}",
	"type": "{$road.type}",
	"url": "{$road.file}",
	"next_node_id": "{$road.end_node_id}",
	"prev_node_id": "{$road.start_node_id}",
	"items": [
	             {if $item_flg == true}
                    {foreach from=$roaditems item=v name=loop}
                        {if $smarty.foreach.loop.last}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "{$v.file}",
                                "viewfile": "{$v.viewfile}",
                                "type": "{$v.type}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            }
        		        {else}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "{$v.file}",
                                "viewfile": "{$v.viewfile}",
                                "type": "{$v.type}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            },
        		        {/if}
                    {/foreach}
                 {/if}
	]
}