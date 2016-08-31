{
	"id": "{$node.node_id}",
	"title": "{$node.title}",
	"type": "{$node.type}",
	"url": "../manavimk2/upload/{$node.file}",
	"lines": [
         {if $road_flg == true}
            {foreach from=$roads item=v name=loop}
                {if $smarty.foreach.loop.last}
		            {
			            "id": "{$v.road_id}",
			            "degree": {$v.degree},
			            "image": "../manavimk2/upload/{$v.image}"
		            }
		        {else}
		            {
			            "id": "{$v.road_id}",
			            "degree": {$v.degree},
			            "image": "../manavimk2/upload/{$v.image}"
		            },
		        {/if}
            {/foreach}
         {/if}
	]
}