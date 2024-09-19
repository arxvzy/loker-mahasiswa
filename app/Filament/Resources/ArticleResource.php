<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Article;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ArticleResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ArticleResource\RelationManagers;
use Rawilk\FilamentQuill\Enums\ToolbarButton;
use Rawilk\FilamentQuill\Filament\Forms\Components\QuillEditor;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationLabel = 'Kelola Artikel';

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->label('Judul')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                FileUpload::make('image')
                    ->label('Cover Image')
                    ->disk('images')
                    ->directory('/')
                    ->visibility('private')
                    ->image()
                    ->previewable(true)
                    ->maxSize(1024)
                    ->fetchFileInformation(false)
                    ->moveFiles()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                    ])
                    ->required(),
                QuillEditor::make('content')
                    ->disableToolbarButtons([ToolbarButton::Image])
                    ->columnSpanFull()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('index')
                    ->label('No.')
                    ->rowIndex(),
                TextColumn::make('created_at')
                    ->label('Tanggal dibuat')
                    ->dateTime('d-M-Y H:i:s')
                    ->sortable(),
                TextColumn::make('title')
                    ->label('Judul'),
                ImageColumn::make('image')
                    ->disk('images')
                    ->visibility('private'),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}
