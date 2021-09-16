<html>

<head>
    <title>Modification d'un personnage</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script>
        function choix(form) {
            i = form.classe_id.selectedIndex;
            if (i == 0) {
                return;
            }

            switch (i) {
                case 1:
                    var txt = new Array('Arme', 'Fureur', 'Protection');
                    break;
                case 2:
                    var txt = new Array('Givre', 'Feu', 'Arcane');
                    break;
                case 3:
                    var txt = new Array('Sacré', 'Discipline', 'Ombre');
                    break;
                case 4:
                    var txt = new Array('Précision', 'Maîtrise des bêtes', 'Survie');
                    break;
            }
            form.classe_id.selectedIndex = i;
            for (i = 0; i < 3; i++) {
                form.nom_specialisation.options[i + 1].text = txt[i];
                form.nom_specialisation.options[i + 1].value = txt[i];
            }
            if (i != 1) {
                form.nom_specialisation.selectedIndex = 0;
            }
        }

    </script>
</head>

<body>

    <h2>Modifier un personnage</h2>
    <form action="{{ route('personnage.update',$personnage->id) }}" method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="d-flex">
            <div class="col-6">
                <label for="">Psuedo</label>
                <input type="text" name="psuedo" class="form-control" {{ $personnage->psuedo }}>
            </div>
            <div class="col-6">
                <label for="">Propriétaire</label>
                <input type="text" name="proprietaire" class="form-control" old="{{ $personnage->proprietaire }}">
            </div>

        </div>

        <div class="row">
            <div class="col-4">
                <div class="">
                    <label for="race" class="row"> Race</label>
                    <select name="nom_race">
                        <option value="">Choississez une race</option>
                        @foreach($racess as $race)
                            <option value="{{ $race->id }}">{{ $race->nom_race }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="">
                    <label for="classe_id"> Classe</label>
                    <select name="classe_id" onchange='choix(form)'>
                        <option value="">Choississez une classe</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->nom_classe }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="">
                    <label for="nom_specialisation">Spécialité</label>
                    <select name="nom_specialisation">
                        <option value="">Choississez une specialisation</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        <button type="submit" id="submit" class="btn btn-success">enregistrer</button>
    </form>
</body>

</html>
