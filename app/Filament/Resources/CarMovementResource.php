<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarMovementResource\Pages;
use App\Filament\Resources\CarMovementResource\RelationManagers;
use App\Models\CarMovement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CarMovementResource extends Resource
{
    protected static ?string $model = CarMovement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('carMovement')
                    ->schema([
                        Forms\Components\Select::make('car_id')
                            ->options(
                                \App\Models\Car::with('carModel.brand')->get()->mapWithKeys(function ($car) {
                                    return [
                                        $car->id => $car->carModel->brand->name . ' ' . $car->carModel->name . ' (' . $car->year . ') - ' . $car->color,
                                    ];
                                })
                            )
                            ->required(),
                        Forms\Components\Select::make('type')
                            ->options([
                                'in' => 'In (Masuk)',
                                'out' => 'Out (Keluar)',
                            ])
                            ->required(),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->placeholder('Optional notes...'),
                        Forms\Components\DateTimePicker::make('moved_at')
                            ->label('Movement Date & Time')
                            ->required()
                            ->default(now()),
                        Forms\Components\TextInput::make('amount')
                            ->label('Jumlah Mobil')
                            ->numeric()
                            ->required(),

                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table

            ->columns([
                // Nama model mobil
                TextColumn::make('car.carModel.name')
                    ->label('Model')
                    ->sortable()
                    ->searchable(),

                // Merek mobil (brand)
                TextColumn::make('car.carModel.brand.name')
                    ->label('Brand')
                    ->sortable()
                    ->searchable(),

                // Warna mobil
                TextColumn::make('car.color')
                    ->label('Color')
                    ->sortable(),

                // Tahun mobil
                TextColumn::make('car.year')
                    ->label('Year')
                    ->sortable(),

                // Jumlah mobil dalam pergerakan
                TextColumn::make('amount')
                    ->label('Jumlah Mobil')
                    ->sortable(),

                // Tipe pergerakan (in/out)
                TextColumn::make('type')
                    ->badge()
                    ->searchable(),

                // Tanggal pergerakan
                TextColumn::make('moved_at')
                    ->label('Moved At')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCarMovements::route('/'),
            'create' => Pages\CreateCarMovement::route('/create'),
            'edit' => Pages\EditCarMovement::route('/{record}/edit'),
        ];
    }
}
