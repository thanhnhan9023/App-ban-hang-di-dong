package com.example.trana.cuahangthietbionline.activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TextView;

import com.example.trana.cuahangthietbionline.R;
import com.example.trana.cuahangthietbionline.model.Giohang;
import com.example.trana.cuahangthietbionline.model.Sanpham;
import com.squareup.picasso.Picasso;

import java.text.DecimalFormat;

public class ChiTiecSanPham extends AppCompatActivity {
    private TextView txtten,txtgia,txtnmota;
    private ImageView imghinh;
    private Toolbar toolbar;
    private ImageButton bttthem;
    private Spinner spinner;
    public int id=0;
    public String TenChiTiec="";
    public int GiaChitiec=0;
    public String hinhanhchitiec="";
    public String MoTachitiec="";
    public int idsanpham=0;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_chi_tiec_san_pham);
        Anhxa();
        Actiontoolbar();
        Getdata();
        CathEventSpinner();
        EventButtonGioHang();

    }

    private void EventButtonGioHang() {
        bttthem.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if(MainActivity.manggiohang.size()>0){
                    int sl=Integer.parseInt(spinner.getSelectedItem().toString());
                    boolean exits=false;
                    for(int i=0;i<MainActivity.manggiohang.size();i++){
                        if(MainActivity.manggiohang.get(i).getIdsp() == id){
                            MainActivity.manggiohang.get(i).setSoluongsp(MainActivity.manggiohang.get(i).getSoluongsp()+sl);
                            if(MainActivity.manggiohang.get(i).getSoluongsp()>10){
                                MainActivity.manggiohang.get(i).setSoluongsp(10);
                            }
                            MainActivity.manggiohang.get(i).setGiasp(GiaChitiec*MainActivity.manggiohang.get(i).getSoluongsp());
                            exits=true;
                        }
                    }
                    if(exits==false){
                        int soluong=Integer.parseInt(spinner.getSelectedItem().toString());
                        long giamoi1=soluong*GiaChitiec;
                        MainActivity.manggiohang.add(new Giohang(id,TenChiTiec,giamoi1,hinhanhchitiec,soluong));
                    }
                }else{
                    int soluong=Integer.parseInt(spinner.getSelectedItem().toString());
                    long giamoi=soluong*GiaChitiec;
                    MainActivity.manggiohang.add(new Giohang(id,TenChiTiec,giamoi,hinhanhchitiec,soluong));
                }
                Intent intent=new Intent(getApplicationContext(),GioHang.class);
                startActivity(intent);
            }

        });
    }

    private void CathEventSpinner() {
        Integer[] soluong=new Integer[]{1,2,3,4,5,6,7,8,9,10};
        ArrayAdapter<Integer> arrayAdapter=new ArrayAdapter<Integer>(this,R.layout.support_simple_spinner_dropdown_item,soluong);
        spinner.setAdapter(arrayAdapter);
    }

    private void Getdata() {
        Sanpham sanpham= (Sanpham) getIntent().getSerializableExtra("thongtinsanpham");
        id=sanpham.getID();
        TenChiTiec=sanpham.getTensanpham();
        GiaChitiec=sanpham.getGiasanpham();
        hinhanhchitiec=sanpham.getHinhanhsanpham();
        MoTachitiec=sanpham.getMotasanpham();
        idsanpham=sanpham.getIDsanpham();
        int gia=sanpham.getGiasanpham();
        txtten.setText(sanpham.getTensanpham());
        txtnmota.setText(sanpham.getMotasanpham());
        DecimalFormat decimalFormat=new DecimalFormat("###,###,###");
        txtgia.setText("Gía "+decimalFormat.format(gia)+" đ");
        Picasso.with(getApplicationContext()).load(sanpham.getHinhanhsanpham())
                .placeholder(R.drawable.imageico)
                .error(R.drawable.error)
                .into(imghinh);
    }

    public void Actiontoolbar() {
        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        toolbar.setNavigationOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                finish();
            }
        });
    }
    public boolean onCreateOptionsMenu(Menu menu) {
        getMenuInflater().inflate(R.menu.menu_trangchinh,menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case R.id.menugiohang :
                Intent intent=new Intent(getApplicationContext(),GioHang.class);
                startActivity(intent);
        }
        return super.onOptionsItemSelected(item);
    }

    private void Anhxa() {
        spinner=(Spinner)findViewById(R.id.spinner);
        toolbar=(Toolbar)findViewById(R.id.toolbarchitiecsanpham);
        txtgia=(TextView)findViewById(R.id.textviewgiachitiec);
        txtnmota=(TextView)findViewById(R.id.textviewmotachitiec);
        txtten=(TextView)findViewById(R.id.textviewtenchitiec);
        imghinh=(ImageView)findViewById(R.id.imageviewanhchitiec);
        bttthem=(ImageButton) findViewById(R.id.buttongiohang);
    }
}
