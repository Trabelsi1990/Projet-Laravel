<html>
    <head>
        <title>Ajouter un Personnage</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>
        
        
        function choix(form)
        {
            i = form.classe_id.selectedIndex;
            if(i == 0 )
            {
                  return ;
            }
           
            switch(i)
            {
                case 1 : var txt = new Array('Arme','Fureur','Protection');
                   break;
                case 2 : var txt = new Array('Givre','Feu','Arcane');
                   break;
                case 3 : var txt = new Array('Sacré','Discipline','Ombre');
                   break;
                case 4 : var txt = new Array('Précision','Maîtrise des bêtes','Survie');
                   break;      
            }
            form.classe_id.selectedIndex = i;
            for(i=0;i<3;i++)
            {
                form.nom_specialisation.options[i+1].text = txt[i]; 
                form.nom_specialisation.options[i+1].value = txt[i];
            } 
             if(i != 1)
                 {
                    form.nom_specialisation.selectedIndex = 0 ;
                 } 
        }
       
    </script>
    </head>
    <body>
    <h2 style="text-align: center">Ajouter un Personnage</h1>
<form action="{{route('personnage.store')}}"  method="POST" enctype="multipart/form-data" >
    @method('POST')
    @csrf
    
        <div class="column">
            <div>
             <label for="">Psuedo</label>
             <input type="text" name="psuedo" class="form-control">   
            </div>
       <div>
          <label for="">Propriétaire</label>
          <input type="text" name="proprietaire" class="form-control">  
       </div>
    
     </div>
    
    
    <label for="nom_race"> <b>Race</b> </label>
    <select name="nom_race" class="form-select form-select-sm"> 
        <option value=""> Choississez une race </option>
      
        @foreach($racess as $race)
            <option value="{{$race->id}}">{{$race->nom_race}}</option>
        @endforeach
    </select>
    <label for="classe_id"> <b>Classe</b> </label>
    <select name="classe_id" onchange='choix(form)' class="form-select form-select-sm">
        <option value="">Choississez une classe</option>
        @foreach($classes as $class)
           <option value="{{$class->id}}">{{$class->nom_classe}}</option> 
        @endforeach
    </select>
    <label for="nom_specialisation"> <b>Spécialisation</b> </label>
    <select  name="nom_specialisation" class="form-select form-select-sm">
        <option value="">Choississez une specialisation</option>
        <option value="" ></option>
        <option value="" ></option>
        <option value="" ></option>
    </select>
     
    <button type="submit" id ="submit"class="btn btn-success" >enregistrer</button>
</form>
</body>  
</html>
