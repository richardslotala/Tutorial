{if isset($article_valide)}
    
    <div class="alert alert-success" id="notif">
        
{$article_valide}

{/if}

{*variable du tableau*}

{foreach from=$TableauArticleSmarty item=tableau}

 <img src="img/{$tableau['id']}.jpg" alt="erreur image" width="200px"/>

    <h2>{$tableau['titre']}</h2>
   <p>{$tableau['texte']}<p>
    <p>{$tableau['date_fr']}</p>
    
    {/foreach}
{*variable pagination*}
<div class="pagination">
    <ul>
       <li><a>page(s)</a></li>
{for $i=1 to $calcul}
    <li {if $i==$page} class='active'{/if}><a href="index.php?page={$i}">{$i}</a></li>
    
{/for}
</ul>
</div>