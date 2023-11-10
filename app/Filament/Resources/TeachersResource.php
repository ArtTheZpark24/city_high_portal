<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeachersResource\Pages;
use App\Filament\Resources\TeachersResource\RelationManagers;
use App\Models\Teachers;
use Faker\Provider\ar_EG\Text;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeachersResource extends Resource
{
    protected static ?string $model = Teachers::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $recordTitleAttribute = 'first_name';
    protected static?string $navigationGroup = 'Teachers/Students';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('')
                ->description('Add teachers')
                ->schema([
                    TextInput::make('teacher_id')->unique()
                    ->required()->rules('numeric'),
                    TextInput::make('first_name')
                    ->required()->minLength('2')->maxLength('255'),
                    TextInput::make('last_name')
                    ->required(),
                    DatePicker::make('date_of_birth')
                    ->required()
                    ->date(),
                    Select::make('gender')->options(['male', 'female'])
                    ->required()->native(false),
                    TextInput::make('address')->required(),
                    TextInput::make('primary_contact')->required()
                    ->rules('required|numeric|digits:11',),
                    TextInput::make('email')
                    ->unique()->required(),
                    TextInput::make('emergency_contact')
                    ->rules('required|numeric|digits:11',),

                    
                    
                  
                ])->columns(3)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('teacher_id'),
                Tables\Columns\TextColumn::make('first_name'),
                Tables\Columns\TextColumn::make('last_name'),
                Tables\Columns\TextColumn::make('date_oft_birth'),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('email')


            ])
            ->filters([
                //
                Tables\Filters\TrashedFilter::make()->native(false)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
               Tables\Actions\RestoreAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->label('Delete')->icon('heroicon-o-trash'),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeachers::route('/create'),
            'edit' => Pages\EditTeachers::route('/{record}/edit'),
        ];
    }    

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
         "Teacher Id" =>$record->teacher_id,
         "Firstname" =>$record->first_name,
         "Lastname" =>$record->last_name
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return [
            'teacher_id',
            'first_name',
            'last_name'
        ];
    }
    public static function getGlobalSearchResultAction(Model $record): array
    {
        return [
            Action::make(name: 'View')
           ->iconButton()
     ->icon(icon: 'heroicon-o-eye')
      ->url(static::getUrl('edit', ['record' => $record])),
        ];
    }
}
