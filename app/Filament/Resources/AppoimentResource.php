<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppoimentResource\Pages;
use App\Filament\Resources\AppoimentResource\RelationManagers;
use App\Models\Appoiment;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppoimentResource extends Resource
{
    protected static ?string $model = Appoiment::class;
    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TimePicker::make('p_time')
                    ->seconds(false)
                    ->datalist([
                        '09:00',
                        '09:30',
                        '10:00',
                        '10:30',
                        '11:00',
                        '11:30',
                        '12:00',
                        '12:30',
                        '13:00',
                        '13:30',
                        '14:00',
                        '14:30',
                        '15:00',
                        '15:30',
                        '16:00',
                        '16:30',
                        '17:00',
                        '17:30',
                        '18:00'
                    ])
                    ->label('Time'),
                DatePicker::make('p_date')
                    ->native(false)
                    ->displayFormat('d/m/Y')
                    ->label('Date'),
                TextInput::make('p_name')
                    ->label('Name')
                    ->placeholder('EX.: John Doner'),
                Select::make('p_appoiment_to')
                    ->searchable()
                    ->options([
                        'Styler' => 'Styler',
                        'Periodic' => 'Periodic Check',
                        'Deworming' => 'Deworming',
                        'Surgery' => 'Surgery',
                        'Urgent' => 'Urgent problems'
                    ])
                    ->label('Appoiment to'),
                Select::make('p_doctor')
                    ->searchable()
                    ->options([
                        'Doctor1' => 'Doctor 1',
                        'Doctor2' => 'Doctor 2'
                    ])
                    ->label('Doctor'),//TODO: Create relationship with user where have role doctors
                TextInput::make('p_reason')
                    ->label('Reason')
                    ->placeholder('EX.: My dog have problem with food'),
                TextInput::make('p_phone')
                    ->tel()
                    ->maxLength(10)
                    ->placeholder('EX.: 0752412421')
                    ->label('Phone number'),
                TextInput::make('p_email')
                    ->email()
                    ->placeholder('EX.: animalmedcenter@gmail.com')
                    ->label('Email'),
                ToggleButtons::make('p_status_appoiment')
                    ->options([
                        'Waiting' => 'Waiting',
                        'Accepted' => 'Accepted',
                        'Declined' => 'Declined',
                        'Progress' => 'In progress',
                        'Complete' => 'Complete',
                        'Expired' => 'Expired'
                    ])
                    ->colors([
                        'Waiting' => 'warning',
                        'Accepted' => 'success',
                        'Declined' => 'danger',
                        'Progress' => 'draft',
                        'Complete' => 'success',
                        'Expired' => 'danger'
                    ])
                    ->icons([
                        'Waiting' => 'heroicon-o-clock',
                        'Accepted' => 'heroicon-o-check-circle',
                        'Declined' => 'heroicon-o-x-circle',
                        'Progress' => 'heroicon-o-wrench',
                        'Complete' => 'heroicon-o-shield-check',
                        'Expired' => 'heroicon-o-shield-exclamation'
                    ])
                    ->columns(3)
                    ->label('Status Appoiment'),
                ToggleButtons::make('p_gdpr_status')
                    ->options([
                        'Invalid' => 'Invalid',
                        'Decline' => 'Decline',
                        'Accepted' => 'Accepted'
                    ])
                    ->colors([
                        'Invalid' => 'info',
                        'Decline' => 'danger',
                        'Accepted' => 'success'
                    ])
                    ->icons([
                        'Invalid' => 'heroicon-o-question-mark-circle',
                        'Decline' => 'heroicon-o-x-circle',
                        'Accepted' => 'heroicon-o-check-circle'
                    ])
                    ->label('Status GDPR')
                    ->inline(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('p_time')
                    ->time()
                    ->label('Time'),
                TextColumn::make('p_date')
                    ->date()
                    ->label('Date'),
                TextColumn::make('p_name')
                    ->label('Name'),
                TextColumn::make('p_phone')
                    ->label('Phone'),
                TextColumn::make('p_email')
                    ->label('Email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
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
            'index' => Pages\ListAppoiments::route('/'),
            'create' => Pages\CreateAppoiment::route('/create'),
            'edit' => Pages\EditAppoiment::route('/{record}/edit'),
        ];
    }
}
