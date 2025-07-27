{assign var="message" value="{$message|escape|default:null}"}

{if $type eq 'success'}
    {assign var="class" value="bg-green-200 text-green-800"}
{elseif $type eq 'danger'}
    {assign var="class" value="bg-red-200 text-red-800"}
{else}
    {assign var="class" value="bg-blue-200 text-blue-800"}
{/if}

<div class="py-4 px-5 rounded flex items-center gap-4 {$class}">
    <svg xmlns="http://www.w3.org/2000/svg" class="text-2xl shrink-0" width="1em" height="1em" fill="currentColor" viewBox="0 0 256 256">
        {if $type eq 'success'}
            <path d="M173.66,98.34a8,8,0,0,1,0,11.32l-56,56a8,8,0,0,1-11.32,0l-24-24a8,8,0,0,1,11.32-11.32L112,148.69l50.34-50.35A8,8,0,0,1,173.66,98.34ZM232,128A104,104,0,1,1,128,24,104.11,104.11,0,0,1,232,128Zm-16,0a88,88,0,1,0-88,88A88.1,88.1,0,0,0,216,128Z"></path>
        {elseif $type eq 'danger'}
            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm-8-80V80a8,8,0,0,1,16,0v56a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,172Z"></path>
        {else}
            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm16-40a8,8,0,0,1-8,8,16,16,0,0,1-16-16V128a8,8,0,0,1,0-16,16,16,0,0,1,16,16v40A8,8,0,0,1,144,176ZM112,84a12,12,0,1,1,12,12A12,12,0,0,1,112,84Z"></path>
        {/if}
    </svg>
    {$message}
</div>
