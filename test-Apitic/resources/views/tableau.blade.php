<!DOCTYPE html>

<head>
    <title>Test Apitic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1 style="text-align: center; margin-top : 5rem"> Test Apitic</h1>
    <div>
        <a href="{{ route('personnage.create') }}" class="btn btn-success"> ajouter un personnage </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pseudo</th>
                <th scope="col">Race</th>
                <th scope="col">Point de vie</th>
                <th scope="col">Armure</th>
                <th scope="col">Détail</th>
                <th scope="col">Propriétaire</th>
                <th scope="col">date et Heure de création</th>
                <th scope="col">Actions</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($personnages as $personnage)
                <tr>
                    <th scope="row">{{ $personnage->id }}</th>
                    <td>
                        {{ couleur($personnage->psuedo) }}

                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }}">
                        {{ $personnage->race->nom_race }}

                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }}">
                        {{ $personnage->perso()->getLife_point() }}
                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }}">
                        {{ $personnage->perso()->getArmor() }}
                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }} ">
                        {!!$personnage->perso()->detail()!!}

                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }}">
                        {{ $personnage->proprietaire }}
                    </td>
                    <td style="background-color: {{ $personnage->perso()->getColor() }}">
                      {{ $personnage->created_at->format('d-m-Y') }}
                      {{ $personnage->created_at->format('H:i') }}
                  </td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('personnage.edit',$personnage) }}"
                                class="btn btn-warning">Modifier</a>

                            <form action="{{ route('personnage.destroy',$personnage) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
