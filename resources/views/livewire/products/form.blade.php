@include('common.modalHead')


<div class="row">
	
	<div class="col-sm-12 col-md-8" >
		<div class="input-group">
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" wire:model.lazy="name" class="form-control" placeholder="Ej: Nombre del Producto">
				@error('name') <span class="text-danger er">{{$message}}</span>@enderror
			</div>
		</div>
	</div>
	<div class="col-sm-12 col-md-4" >
		<div class="form-group">
			<label>Código</label>
			<input type="text" wire:model.lazy="barcode" class="form-control" placeholder="Ej: 143alll481negrnegr34negr">
			@error('barcode') <span class="text-danger er">{{$message}}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4" >
		<div class="form-group">
			<label>Costo</label>
			<input type="text" data-type='currency' wire:model.lazy="cost" class="form-control" placeholder="Ej:110.00">
			@error('cost') <span class="text-danger er">{{$message}}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4" >
		<div class="form-group">
			<label>Precio</label>
			<input type="text" data-type='currency' wire:model.lazy="price" class="form-control" placeholder="Ej: 0.00">
			@error('price') <span class="text-danger er">{{$message}}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4" >
		<div class="form-group">
			<label>Stock</label>
			<input type="number" wire:model.lazy="stock" class="form-control" placeholder="Ej: 0">
			@error('stock') <span class="text-danger er">{{$message}}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4" >
		<div class="form-group">
			<label>Alerta / Inventario Mínimo</label>
			<input type="number" wire:model.lazy="alerts" class="form-control" placeholder="Ej: 10">
			@error('alerts') <span class="text-danger er">{{$message}}</span>@enderror
		</div>
	</div>

 	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Categoria</label>
			<select wire:model.lazy='categoryid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($categories as $category)
				<option value="{{ $category->id }}" >{{ $category->name }}</option>
				@endforeach
			</select>
			@error('categoryid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

 	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Marca</label>
			<select wire:model.lazy='markid' class="form-control" id="select_markid">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($marks as $mark)
				<option value="{{ $mark->id }}" >{{ $mark->name }}</option>
				@endforeach
			</select>
			@error('markid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

 	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Industria</label>
			<select wire:model.lazy='industryid' class="form-control" id="select_industryid">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($industries as $industry)
				<option value="{{ $industry->id }}" >{{ $industry->name }}</option>
				@endforeach
			</select>
			@error('industryid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	 <div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Modelos</label>
			<select wire:model.lazy='modelid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($models as $model)
				<option value="{{ $model->id }}" >{{ $model->name }}</option>
				@endforeach
			</select>
			@error('modelid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

 	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Tipo</label>
			<select wire:model.lazy='typeid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($types as $type)
				<option value="{{ $type->id }}" >{{ $type->name }}</option>
				@endforeach
			</select>
			@error('typeid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Textura Planta</label>
			<select wire:model.lazy='texturecolorid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($texturecolors as $texturecolor)
				<option value="{{ $texturecolor->id }}" >{{ $texturecolor->name }}</option>
				@endforeach
			</select>
			@error('texturecolorid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	 <div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Talla</label>
			<select wire:model.lazy='sizeid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($sizes as $size)
				<option value="{{ $size->id }}" >{{ $size->name }}</option>
				@endforeach
			</select>
			@error('sizeid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	 <div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Planta Color</label>
			<select wire:model.lazy='plantcolorid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($plantcolors as $plantcolor)
				<option value="{{ $plantcolor->id }}" >{{ $plantcolor->name }}</option>
				@endforeach
			</select>
			@error('plantcolorid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	 <div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Color de Suela</label>
			<select wire:model.lazy='solecolorid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($solecolors as $solecolor)
				<option value="{{ $solecolor->id }}" >{{ $solecolor->name }}</option>
				@endforeach
			</select>
			@error('solecolorid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	 <div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Material de Suela</label>
			<select wire:model.lazy='soletypeid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($soletypes as $soletype)
				<option value="{{ $soletype->id }}" >{{ $soletype->name }}</option>
				@endforeach
			</select>
			@error('soletypeid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Tipo de Covertura / Material</label>
			<select wire:model.lazy='coveringtypeid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($coveringtypes as $coveringtype)
				<option value="{{ $coveringtype->id }}" >{{ $coveringtype->name }}</option>
				@endforeach
			</select>
			@error('coveringtypeid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>

 	<div class="col-sm-12 col-md-4">
		<div class="form-group">
			<label>Color de Textura</label>
			<select wire:model.lazy='coveringmaterialid' class="form-control">
				<option value="Elegir" disabled>Elegir</option>
				@foreach($coveringmaterials as $coveringmaterial)
				<option value="{{ $coveringmaterial->id }}" >{{ $coveringmaterial->name }}</option>
				@endforeach
			</select>
			@error('coveringmaterialid') <span class="text-danger er">{{ $message }}</span>@enderror
		</div>
	</div>


	<div class="col-sm-12 col-md-8">
			<label>Cargue una Imagen</label>
		<div class="form-group custom-file">
			<input type="file" class="custom-file-input form-control" wire:model="image" accept="image/x-png, image/gif, image/jpeg">
			<label class="custom-file-label">
				Imagen{{ $image }}
			</label>
			@error('image') <span class="text-danger er">{{$message}}</span>@enderror

		</div>
	</div>

</div>

@include('common.modalFooter')