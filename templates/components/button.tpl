{assign var="type" value="{$type|escape|default:'button'}"}
{assign var="label" value="{$label|escape|default:'Button'}"}
{assign var="class" value="inline-flex whitespace-nowrap bg-[#004481] text-lg text-white px-4 py-2 {$class}"}

{if $type == 'link'}
<a href="{$href}" class="{$class}" title="{$label}">{$label}</a>
{else}
<button type="{$type}" class="{$class}">{$label}</button>
{/if}
