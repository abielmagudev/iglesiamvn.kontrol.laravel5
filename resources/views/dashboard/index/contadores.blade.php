<div class="box">
    <div class="level">
        <div class="level-item">
            <div>
                <p class="heading">Miembros</p>
                <p class="title"><?= $members->count() ?></p>
            </div>
        </div>
        <div class="level-item">
            <div>
                <p class="heading">Hombres</p>
                <p class="title"><?= $members->where('gender', 'm')->count() ?></p>
            </div>
        </div>
        <div class="level-item">
            <div>
                <p class="heading">Mujeres</p>
                <p class="title"><?= $members->where('gender', 'f')->count() ?></p>
            </div>
        </div>
        <div class="level-item">
            <div>
                <p class="heading">Activos</p>
                <p class="title"><?= $members->where('is_active', 1)->count() ?></p>
            </div>
        </div>
        <div class="level-item">
            <div>
                <p class="heading">Inactivos</p>
                <p class="title"><?= $members->where('is_active', 0)->count() ?></p>
            </div>
        </div>
    </div>
</div>
