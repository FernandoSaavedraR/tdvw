/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package garnachas;

import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.TextField;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author xavil
 */
public class InventarioController implements Initializable {
    @FXML
    private Button MenuPrin;
     @FXML
    private TableView<Recetas> pedidos;
    @FXML
    private TableColumn<Recetas, String> id;
    @FXML
    private TableColumn<Recetas, String> requerido;
    @FXML
    private TableColumn<Recetas, String> producto;
    @FXML
    private TableColumn<Recetas, String> disponible;
    @FXML
    private TableColumn<Recetas, String> nombre;
    @FXML
    private TextField filtro;
    @FXML
    private Button reiniciar;
    @FXML
    private TextField eliminar;
    /**
     * Initializes the controller class.
     */
   @FXML
   private void IrMenu (ActionEvent event) throws Exception {
        Parent root = FXMLLoader.load(getClass().getResource("MenuPrincipal.fxml"));
        Scene scene = new Scene(root);
        Stage appStage = (Stage) ((Node) event.getSource()).getScene().getWindow();
        appStage.setScene(scene);
        appStage.toFront();
        appStage.show();     
   }
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        llenar();
    } 
    @FXML
    private void eliminar(){
        if(!eliminar.getText().trim().isEmpty())
        {
            try{
               Conectar cnx = new Conectar();
            cnx.eliminar(Integer.parseInt(eliminar.getText()));
            eliminar.setText("");
            llenar(); 
            }catch(NumberFormatException nfe){
               Alert alert = new Alert(Alert.AlertType.WARNING);
                alert.setTitle("Ingrediente");
                alert.setHeaderText("Campos invalidos");
                alert.setContentText("Ingrese un numero");
                alert.showAndWait();
            }
            
        }else{
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
        }
    }
     @FXML
    private void llenar() {
        ObservableList<Recetas> recetas = FXCollections.observableArrayList();
        Conectar cnx = new Conectar();
        recetas = cnx.tablaRecetas();
        id.setCellValueFactory(new PropertyValueFactory<>("id"));
        requerido.setCellValueFactory(new PropertyValueFactory<>("requerido"));
        producto.setCellValueFactory(new PropertyValueFactory<>("producto"));
        disponible.setCellValueFactory(new PropertyValueFactory<>("disponible"));
        nombre.setCellValueFactory(new PropertyValueFactory<>("nombre"));
        pedidos.setItems(recetas);
        filtro.setText("");
    }
    @FXML
    private void filtrar(){
        String filtrar = filtro.getText();
        if(!filtrar.trim().isEmpty())
        {
            ObservableList<Recetas> recetas = FXCollections.observableArrayList();
            Conectar cnx = new Conectar();
            recetas = cnx.tablaFiltro(filtrar);
            id.setCellValueFactory(new PropertyValueFactory<>("id"));
            requerido.setCellValueFactory(new PropertyValueFactory<>("requerido"));
            producto.setCellValueFactory(new PropertyValueFactory<>("producto"));
            disponible.setCellValueFactory(new PropertyValueFactory<>("disponible"));
            nombre.setCellValueFactory(new PropertyValueFactory<>("nombre"));
            pedidos.setItems(recetas);
        }else{
            Alert alert = new Alert(Alert.AlertType.WARNING);
            alert.setTitle("Ingrediente");
            alert.setHeaderText("Campos invalidos");
            alert.setContentText("LLene sus campos");

            alert.showAndWait();
        }
        filtro.setText("");
    }
}
