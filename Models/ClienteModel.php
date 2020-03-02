<?php

namespace Models;

use Classes\Model;

class ClienteModel extends Model {
    
    
    public function filtrar_por_id( $id ) {
        
        $stmt = $this->db->prepare(
            'SELECT * FROM clientes
              WHERE id = ?'
        );
        
        
        $stmt->bind_param( 'i', $id );
        
        $stmt->execute();
        
        return $stmt->get_result()->fetch_object();
    }
    
    
    public function filtrar_todos() {
        
        $stmt = $this->db->prepare(
            'SELECT * FROM clientes'
        );
        
        $stmt->execute();
        
        return $stmt->get_result();
    }
        
    public function salvar( $cliente ) {
        if ( $cliente->id == NULL || empty( $cliente->id ) ) {
            $this->inserir( $cliente );
        } else {
            $this->alterar( $cliente );
        }
    }    
    
    public function inserir( $cliente ) {        
        $stmt = $this->db->prepare(
            'INSERT INTO clientes (nome, data_nascimento, cpf, rg, telefone)
                  VALUES (?,?,?,?,?)'
        );
        
        
        $stmt->bind_param( 'sssss',
            $cliente->nome,    
            $cliente->data_nascimento,
            $cliente->cpf,            
            $cliente->rg,
            $cliente->telefone            
        );
        
        return $stmt->execute();
    }
    
    
    public function alterar( $cliente ) {        
        $stmt = $this->db->prepare(
            'UPDATE clientes
                SET nome = ?,
                    data_nascimento = ?,
                    cpf = ?,
                    rg = ?,
                    telefone = ?                   
              WHERE id = ?'
        );
        
        $stmt->bind_param( 'sssssi',
            $cliente->nome,
            date("Y-m-d", strtotime($cliente->data_nascimento)),            
            $cliente->cpf,
            $cliente->rg,
            $cliente->telefone,            
            $cliente->id
        );
        
        return $stmt->execute();
    }    
    
    public function excluir( $id ) {
        
        $stmt = $this->db->prepare(
            'DELETE FROM clientes
                   WHERE id = ?'
        );
        
        
        $stmt->bind_param( 'i', $id );
        
        return $stmt->execute();
    }
    
}