<?php  @$url = explode('/',url()->current())[4]; ?>

<li>
    <a href="<?php echo URL::to('/') ?>" class="{{$classe}}menu <?php if(@$url==''){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="home"></i> </div>
        <div class="{{$classe}}menu__title"> Tableau de bord </div>
    </a>
</li>

<li>
    <a href="javascript:;" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="box"></i> </div>
        <div class="{{$classe}}menu__title">
            Mon profil 
            <div class="{{$classe}}menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{$classe}} side-menu__sub-open">
        <li>
            <a href="<?php echo URL::to('/para-tarifs') ?>" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Mes informations </div>
            </a>
        </li>
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Fiche de poste </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Mes Absences </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Mes Formations </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Mes Besoins </div>
            </a>
        </li>
        
    </ul>
</li>

<li>
    <a href="<?php echo URL::to('/app-utilisateurs') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="home"></i> </div>
        <div class="{{$classe}}menu__title"> Gestion du personnel </div>
    </a>
</li>

<li>
    <a href="javascript:;" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="box"></i> </div>
        <div class="{{$classe}}menu__title">
            Gestion des carrières 
            <div class="{{$classe}}menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{$classe}} side-menu__sub-open">
        <li>
            <a href="<?php echo URL::to('/para-tarifs') ?>" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Liste des agents </div>
            </a>
        </li>
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Liste des fonctions </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Titularisations</div>
            </a>
        </li>
        
    </ul>
</li>

<li>
    <a href="javascript:;" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="box"></i> </div>
        <div class="{{$classe}}menu__title">
            Gestion des demandes 
            <div class="{{$classe}}menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{$classe}} side-menu__sub-open">
        <li>
            <a href="<?php echo URL::to('/para-tarifs') ?>" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Demandes d'absences </div>
            </a>
        </li>
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Demandes de congés </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Dem. de formations individuelles</div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Dem. de formations groupées </div>
            </a>
        </li>
        
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Accidents de travail </div>
            </a>
        </li>
        
    </ul>
</li>

<li>
    <a href="javascript:;" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="box"></i> </div>
        <div class="{{$classe}}menu__title">
            Gestion des formations 
            <div class="{{$classe}}menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
        </div>
    </a>
    <ul class="{{$classe}} side-menu__sub-open">
        <li>
            <a href="<?php echo URL::to('/para-tarifs') ?>" class="{{$classe}}menu <?php if(@$url=='url' ){echo 'side-menu--active';} ?>">
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Budget de formation </div>
            </a>
        </li>
        <li>
            <a href="<?php echo URL::to('/para-niveaux') ?>" class="{{$classe}}menu <?php if(@$url=='url'){echo 'side-menu--active';} ?>" >
                <div class="mi {{$classe}}menu__icon"> <i data-lucide="activity"></i> </div>
                <div class="{{$classe}}menu__title"> Planing formation </div>
            </a>
        </li>
    </ul>
</li>

<li class="nav__devider my-6"></li>

<li>
    <a href="<?php echo URL::to('/') ?>" class="{{$classe}}menu">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="message-square"></i> </div>
        <div class="{{$classe}}menu__title"> Entreprise </div>
    </a>
</li>

<li>
    <a href="<?php echo URL::to('/') ?>" class="{{$classe}}menu">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="message-square"></i> </div>
        <div class="{{$classe}}menu__title"> Paramètre </div>
    </a>
</li>

<li>
    <a href="<?php echo URL::to('/liste-utilisateurs') ?>" class="{{$classe}}menu <?php if(@$url=='liste-utilisateurs' || @$url=='ajouter-utilisateur'|| @$url=='modifier-utilisateur'){echo 'side-menu--active';} ?>">
        <div class="mi {{$classe}}menu__icon"> <i data-lucide="home"></i> </div>
        <div class="{{$classe}}menu__title"> Utilisateurs </div>
    </a>
</li>
