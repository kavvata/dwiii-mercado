<?php

// @formatter:off
// phpcs:ignoreFile

/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property string $nome
     * @property string $descricao
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produto> $produtos
     * @property-read int|null $produtos_count
     *
     * @method static \Database\Factories\CategoriaFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereDescricao($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereNome($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Categoria withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperCategoria {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property string $nome
     * @property string $cpf
     * @property string $telefone
     * @property string $email
     * @property int|null $endereco_id
     * @property-read \App\Models\Endereco|null $endereco
     *
     * @method static \Database\Factories\ClienteFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereCpf($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereEnderecoId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereNome($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereTelefone($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Cliente withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperCliente {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property string $cep
     * @property string $cidade
     * @property string $rua
     * @property string $numero
     * @property string $bairro
     * @property string $uf
     * @property string $complemento
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Cliente> $clientes
     * @property-read int|null $clientes_count
     *
     * @method static \Database\Factories\EnderecoFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereBairro($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereCep($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereCidade($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereComplemento($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereNumero($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereRua($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereUf($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Endereco withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperEndereco {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property string $provider_name
     * @property string $provider_id
     * @property string $provider_token
     * @property int $user_id
     * @property-read \App\Models\User|null $user
     *
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereProviderId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereProviderName($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereProviderToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|LinkedSocialAccount whereUserId($value)
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperLinkedSocialAccount {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property string $nome
     * @property string $imagem_src
     * @property string $descricao
     * @property int $quantidade
     * @property float $preco
     * @property int $categoria_id
     * @property int $unidade_medida_id
     * @property-read \App\Models\Categoria|null $categoria
     * @property-read \App\Models\UnidadeMedida|null $unidadeMedida
     *
     * @method static \Database\Factories\ProdutoFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereCategoriaId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereDescricao($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereNome($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto wherePreco($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereQuantidade($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereUnidadeMedidaId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Produto withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperProduto {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property string $sigla
     * @property string $descricao
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Produto> $produtos
     * @property-read int|null $produtos_count
     *
     * @method static \Database\Factories\UnidadeMedidaFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereDescricao($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereSigla($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|UnidadeMedida withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperUnidadeMedida {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property string $name
     * @property string $email
     * @property \Illuminate\Support\Carbon|null $email_verified_at
     * @property string $password
     * @property string|null $remember_token
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LinkedSocialAccount> $linkedSocialAccounts
     * @property-read int|null $linked_social_accounts_count
     * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
     * @property-read int|null $notifications_count
     *
     * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperUser {}
}

namespace App\Models
{
    /**
     * @property int $id
     * @property \Illuminate\Support\Carbon|null $created_at
     * @property \Illuminate\Support\Carbon|null $updated_at
     * @property \Illuminate\Support\Carbon|null $deleted_at
     * @property int $quantidade
     * @property float $preco
     * @property \Illuminate\Support\Carbon $data_venda
     * @property int $produto_id
     * @property int $cliente_id
     * @property int $user_id
     * @property-read \App\Models\Cliente|null $cliente
     * @property-read \App\Models\Produto|null $produto
     * @property-read \App\Models\User|null $user
     *
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda newModelQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda newQuery()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda onlyTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda query()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereClienteId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereCreatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereDataVenda($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereDeletedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda wherePreco($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereProdutoId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereQuantidade($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereUpdatedAt($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda whereUserId($value)
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda withTrashed()
     * @method static \Illuminate\Database\Eloquent\Builder<static>|Venda withoutTrashed()
     *
     * @mixin \Eloquent
     */
    #[\AllowDynamicProperties]
    class IdeHelperVenda {}
}
