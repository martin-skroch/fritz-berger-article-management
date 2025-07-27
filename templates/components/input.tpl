{if $type != 'hidden'}
<div{if $class} class="{$class}"{/if}>
    {if $label}<label for="{$name}" class="block text-sm font-bold mb-1">{$label}</label>{/if}
    <input type="{$type|default:'text'}" name="{$name}" id="{$name}" value="{$value}" {if isset($step)} step="{$step}"{/if} class="border p-2 text-lg w-full{if $invalid} border-red-500{/if}">
    {if $invalid}<div class="text-red-600 text-sm mt-1">{$invalid}</div>{/if}
</div>
{else}
    <input type="hidden" name="{$name}" value="{$value}" {if $required} required{/if}>
{/if}
