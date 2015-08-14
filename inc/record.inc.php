<!--HTML форма для add/edit.inc.php-->

<style>
#addButton{
display: none;
    }
    #publishButton{
        display: inline-block;
    }
    #cancelButton{
        display: inline-block;
    }
</style>
<div class="create_news">
    <form action=" " method="post" id = "addNews">
        <label class="field__label">Заголовок новини:</label>
        <div class="field__desc">Сформулюйте заголовок так, щоб відразу стало зрозуміло, про що йде мова.</div>
        <input type="text" name="title" value="<?=$row["title"]?>" required />
        <label class="field__label">Текст новини:</label>
        <div class="field__desc">Опишіть,що сталося.</div>
        <textarea name="body" cols="50" rows="5" required><?=$row["body"]?></textarea>
        <label class="field__label">Дата:</label>
        <div class="field__desc">Оберіть дату.</div>
        <input type="date" name="calendar" value="<?=$row["dt"]?>" required />
    </form>
</div>
