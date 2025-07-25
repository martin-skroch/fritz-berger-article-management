{if $type != 'hidden'}
<div>
    <label for="{$name}" class="block text-sm font-bold mb-1">{$label}</label>
    <input type="{$type|default:'text'}" name="{$name}" id="{$name}" value="{$value}" {if $required} required{/if} {if isset($step)} step="{$step}"{/if} class="border p-3 text-lg w-full">
</div>
{else}
    <input type="hidden" name="{$name}" value="{$value}" {if $required} required{/if}>
{/if}