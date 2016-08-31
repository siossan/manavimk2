{
	"id": "{$road.road_id}",
	"title": "{$road.title}",
	"type": "{$road.type}",
	"url": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$road.file}",
	"next_node_id": "{$road.end_node_id}",
	"prev_node_id": "{$road.start_node_id}",
	"items": [
	             {if $item_flg == true}
                    {foreach from=$roaditems item=v name=loop}
                        {if $smarty.foreach.loop.last}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.file}",
                                "viewfile": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.viewfile}",
                                "type": "{$v.type}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            }
        		        {else}
        		            {
        			            "id": "{$v.item_id}",
        			            "title": "{$v.title}",
                                "file": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.file}",
                                "viewfile": "www.snowwhite.hokkaido.jp/manavimk2/common/files/{$v.viewfile}",
                                "type": "{$v.type}",
                                "start": "{$v.start_time}",
                                "end": "{$v.end_time}"
        		            },
        		        {/if}
                    {/foreach}
                 {/if}
	]
}