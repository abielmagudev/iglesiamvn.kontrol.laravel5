<div class="box has-text-centered">
    <div class="columns">
        <div class="column">
            <p class="heading">Miembros</p>
            <p class="title"><?= $members->count() ?></p>
        </div>
        <div class="column">
            <p class="heading">Hombres</p>
            <p class="title"><?= $members->where('gender', 'm')->count() ?></p>
        </div>
        <div class="column">
            <p class="heading">Mujeres</p>
            <p class="title"><?= $members->where('gender', 'f')->count() ?></p>
        </div>
        <div class="column">
            <p class="heading">Activos</p>
            <p class="title"><?= $members->where('is_active', 1)->count() ?></p>
        </div>
        <div class="column">
            <p class="heading">Inactivos</p>
            <p class="title"><?= $members->where('is_active', 0)->count() ?></p>
        </div>
    </div>
</div>