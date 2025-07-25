{if $type == 'link'}
<a href="{$href}" class="inline-flex whitespace-nowrap bg-[#004481] text-lg text-white px-4 py-2 {$class}" title="{$label}">{$label}</a>
{else}
<button type="{$type|default:'button'}" class="inline-flex whitespace-nowrap bg-[#004481] text-lg text-white px-4 py-2 {$class}">{$label}</button>
{/if}
