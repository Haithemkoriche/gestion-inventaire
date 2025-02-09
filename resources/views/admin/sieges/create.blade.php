@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Ajouter un Siège</h1>

        <form method="POST" action="{{ route('admin.sieges.store') }}">
            @csrf

            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>

            <div class="mb-3">
                <label for="address_siege" class="form-label">Adresse du Siège</label>
                <input type="text" class="form-control" id="address_siege" name="address_siege" required>
            </div>

            <div class="mb-3">
                <label for="wilaya_sieges" class="form-label">Wilaya du Siège</label>
                <select class="form-control" id="wilaya_sieges" name="wilaya_sieges" required>
                    <option value="">Sélectionnez une wilaya</option>
                    <option value="Adrar">Adrar</option>
                    <option value="Chlef">Chlef</option>
                    <option value="Laghouat">Laghouat</option>
                    <option value="Oum El Bouaghi">Oum El Bouaghi</option>
                    <option value="Batna">Batna</option>
                    <option value="Béjaïa">Béjaïa</option>
                    <option value="Biskra">Biskra</option>
                    <option value="Béchar">Béchar</option>
                    <option value="Blida">Blida</option>
                    <option value="Bouira">Bouira</option>
                    <option value="Tamanrasset">Tamanrasset</option>
                    <option value="Tébessa">Tébessa</option>
                    <option value="Tlemcen">Tlemcen</option>
                    <option value="Tiaret">Tiaret</option>
                    <option value="Tizi Ouzou">Tizi Ouzou</option>
                    <option value="Alger">Alger</option>
                    <option value="Djelfa">Djelfa</option>
                    <option value="Jijel">Jijel</option>
                    <option value="Sétif">Sétif</option>
                    <option value="Saïda">Saïda</option>
                    <option value="Skikda">Skikda</option>
                    <option value="Sidi Bel Abbès">Sidi Bel Abbès</option>
                    <option value="Annaba">Annaba</option>
                    <option value="Guelma">Guelma</option>
                    <option value="Constantine">Constantine</option>
                    <option value="Médéa">Médéa</option>
                    <option value="Mostaganem">Mostaganem</option>
                    <option value="M'Sila">M'Sila</option>
                    <option value="Mascara">Mascara</option>
                    <option value="Ouargla">Ouargla</option>
                    <option value="Oran">Oran</option>
                    <option value="El Bayadh">El Bayadh</option>
                    <option value="Illizi">Illizi</option>
                    <option value="Bordj Bou Arreridj">Bordj Bou Arreridj</option>
                    <option value="Boumerdès">Boumerdès</option>
                    <option value="El Tarf">El Tarf</option>
                    <option value="Tindouf">Tindouf</option>
                    <option value="Tissemsilt">Tissemsilt</option>
                    <option value="El Oued">El Oued</option>
                    <option value="Khenchela">Khenchela</option>
                    <option value="Souk Ahras">Souk Ahras</option>
                    <option value="Tipaza">Tipaza</option>
                    <option value="Mila">Mila</option>
                    <option value="Aïn Defla">Aïn Defla</option>
                    <option value="Naâma">Naâma</option>
                    <option value="Aïn Témouchent">Aïn Témouchent</option>
                    <option value="Ghardaïa">Ghardaïa</option>
                    <option value="Relizane">Relizane</option>
                    <option value="Timimoun">Timimoun</option>
                    <option value="Bordj Badji Mokhtar">Bordj Badji Mokhtar</option>
                    <option value="Ouled Djellal">Ouled Djellal</option>
                    <option value="Béni Abbès">Béni Abbès</option>
                    <option value="In Salah">In Salah</option>
                    <option value="In Guezzam">In Guezzam</option>
                    <option value="Touggourt">Touggourt</option>
                    <option value="Djanet">Djanet</option>
                    <option value="El M'Ghair">El M'Ghair</option>
                    <option value="El Menia">El Menia</option>
                </select>
            </div>

            <!-- Add other form fields for additional attributes of the siege if needed -->

            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
