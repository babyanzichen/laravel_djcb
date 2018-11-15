<script id="sListTpl" type="text/x-handlebars-template">
{{#each this}}
{{#isInitData this @index}}
<li class="song btm-line" data-src={{songSrc}} data-index={{id}}>
    <div class="poster">
        <img src={{poster.thumbnail}}>
    </div>
    <div class="songinfo">
        <h2 class="lsongname">{{songName}}</h2>
        <sub class="lsinger">{{singer}}</sub>
    </div>
    <div class="loveflag">
        <i class="icon icon-love {{#if loveFlag}}active{{/if}}"></i>
    </div>
</li>
{{/isInitData}}
{{/each}}
</script>