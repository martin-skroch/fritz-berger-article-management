{if $type == 'link'}
<a href="{$href}" class="inline-flex bg-[#004481] text-lg text-white px-5 py-3" title="{$label}">{$label}</a>
{else}
<button type="{$type|default:'button'}" class="inline-flex bg-[#004481] text-lg text-white px-5 py-3">{$label}</button>
{/if}