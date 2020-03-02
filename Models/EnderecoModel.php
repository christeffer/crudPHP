<?php

namespace Models;

use Classes\Model;

class EnderecoModel extends Model {
    
    
    public function filtrar_por_cliente( $id ) {
        $stmt = $this->db->prepare(
            'SELECT * FROM enderecos
              WHERE cliente_id = ?'
        );
        
        
        $stmt->bind_param( 'i', $id );
        
        $stmt->execute();
        
        return $stmt->get_result();
    }

    public function filtrar_por_id( $id ) {
        
        $stmt = $this->db->prepare(
            'SELECT * FROM enderecos
              WHERE id = ?'
        );
        
        
        $stmt->bind_param( 'i', $id );
        
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
    }
      
        
    public function salvar( $endereco ) {
        if ( $endereco->id == NULL || empty( $endereco->id ) ) {
            $this->inserir( $endereco );
        } else {
            $this->alterar( $endereco );
        }
    }    
    
    public function inserir( $endereco ) {    
        $stmt = $this->db->prepare(
            'INSERT INTO enderecos (cliente_id, logradouro, bairro, cep, numero)
                  VALUES (?,?,?,?,?)'
        );        
        
        $stmt->bind_param( 'issss',
            $endereco->cliente_id,    
            $endereco->logradouro,
            $endereco->bairro,            
            $endereco->cep,
            $endereco->numero            
        );
        
        return $stmt->execute();
    }
    
    
    public function alterar( $endereco ) {        
        $stmt = $this->db->prepare(
            'UPDATE enderecos
                SET logradouro = ?,
                    bairro = ?,
                    cep = ?,                    
                    numero = ?                   
              WHERE id = ?'
        );
        
        $stmt->bind_param( 'ssssi',
            $endereco->logradouro,
            $endereco->bairro,
            $endereco->cep,
            $endereco->numero,            
            $endereco->id
        );
        
        return $stmt->execute();
    }    
    
    public function excluir( $id ) {
        
        $stmt = $this->db->prepare(
            'DELETE FROM enderecos
                   WHERE id = ?'
        );        
        
        $stmt->bind_param( 'i', $id );
        
        return $stmt->execute();
    }
    
}