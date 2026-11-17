package enael.examen;

public class MainOutCamionAnese {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Camion camion1 = new Camion("CAM-001", 2500, 20.0);
		
		Materiel palette1 = new Palette("PAL-001");
		Materiel palette2 = new Palette("PAL-002");
		Materiel palette3 = new Palette("PAL-003");
		Materiel palette4 = new Palette("PAL-004");
		Materiel vrac1 = new Vrac("VRC-001");
		Materiel vrac2 = new Vrac("VRC-002");
		Materiel vrac3 = new Vrac("VRC-003");
		Materiel vrac4 = new Vrac("VRC-004");
		Materiel vrac5 = new Vrac("VRC-005");
		Materiel vrac6 = new Vrac("VRC-005");
		Materiel vrac7 = new Vrac("VRC-007");
		Materiel vrac8 = new Vrac("VRC-008");
		
		LoadMaster lmt = LoadMaster.getInstance();
		lmt.charger(camion1, palette1, palette2, vrac1, vrac4, vrac6);
		System.out.println("////////////////PAR ID/////////////");
		lmt.afficherChargementParID(camion1);
		System.out.println("////////////////PAR VOLUME/////////////");
		lmt.afficherChargementParVolume(camion1);
		System.out.println("////////////////PAR POID/////////////");
		lmt.afficherChargementParPoid(camion1);
		System.out.println("//////////////////");
		lmt.afficherVolumeCharger(camion1);
	}

}
