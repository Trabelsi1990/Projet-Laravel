{{-- blade pour toutes les affichage des messages que ce soit a l'ajout ou modification ou la supression --}}
@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div>
@endif

@if(session('warning'))
    <div class="alert alert-warning" role="alert">
        {{session('warning')}}
    </div>
@endif

@if(session('danger'))
    <div class="alert alert-danger" role="alert">
        {{session('danger')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" role="alert">
        {{session('error')}}
    </div>
@endif

@if(session('create'))
<div class="alert alert-success">
    {{ session('create') }}
</div>
@endif
@if(session('delete'))
<div class="alert alert-success">
    {{ session('delete') }}
</div>
@endif
@if(session('destroy_article'))
<div class="alert alert-success">
    {{ session('destroy_article') }}
</div>
@endif

@if(session('update'))
<div class="alert alert-success">
    {{ session('update') }}
</div>
@endif

@if(session('create_article'))
<div class="alert alert-success">
    {{ session('create_article') }}
</div>
@endif
@if(session('modif_article'))
<div class="alert alert-success">
    {{ session('modif_article') }}
</div>
@endif
@if(session('delete_article'))
<div class="alert alert-success">
    {{ session('delete_article') }}
</div>
@endif
      @if (session('modif'))
        <div class="alert alert-success">
          {{ session('modif') }}
        </div> 
      @endif
    
      @if(session('ajout'))
      <div class="alert alert-success">
          {{ session('ajout') }}
      </div>
  @endif
 
@if(session('destroy'))
  <div class="alert alert-success">
      {{ session('destroy') }}
  </div>
@endif
@if (session('creat'))
<div class="alert alert-success">
  {{ session('creat') }}
</div> 
@endif
@if (session('delet'))
<div class="alert alert-success">
{{ session('delet') }}
</div>
@endif 
@if (session('updat'))
<div class="alert alert-success">
{{ session('updat') }}
</div>
@endif



